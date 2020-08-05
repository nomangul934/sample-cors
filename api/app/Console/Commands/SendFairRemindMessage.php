<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
//Added by @prasasd
use Carbon\Carbon;
use App\Models\User;
use App\Models\Unviersity;
use App\Models\School;
use App\Models\Fair;
use App\Models\Invitation;
use Illuminate\Support\Facades\DB;
use App\Mail\SchoolFairReminderMail;
use Illuminate\Support\Facades\Mail;
class SendFairRemindMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schoolfair:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Reminder Email to Unversities before 48 hours';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $current_datetime = Carbon::now();
        $fourtyeight_datetime = $current_datetime->copy()->subHours(48);
        $fairs = Fair::select('fairs.id as fair_id','fairs.school_id as school_id','fairs.start_date as startdate','fairs.end_date as enddate',
                            'schools.name as schoolname','schools.address1 as address1','schools.address2 as address2','schools.country as country',
                            'schools.city as city','schools.latitude as lattitude','schools.longitude as longitude')                            
                       ->leftjoin('schools','schools.id','=','fairs.school_id')
                       ->whereBetween('fairs.start_date',[$current_datetime,$fourtyeight_datetime])->get();        
        $reminder_arr = array();
        foreach($fairs as $one_fair) {
            $univ = Invitation::select('users.email as email','universities.name as unitiversity_name')
                                ->leftjoin('users','users.university_id','=','invitations.university_id')
                                ->leftjoin('universities','universities.id','=','users.university_id')
                                ->where('invitations.accepted',1)
                                ->where('users.role','university')
                                ->where('invitations.fair_id',$one_fair->fair_id)
                                ->get();                                
            $emails_arr = array();
            foreach ($univ as $one_univ) {
                array_push($emails_arr, $one_univ->email);
                $googlemaplink = 'Google Map Link';      
                if ($one_univ->latitude!='' && $one_univ->longitude != '') {
                    $googlemaplink = "https://maps.google.com/?ll=".$one_univ->latitude.','.$one_univ->longitude;
                } else {
                    $googlemaplink = "https://maps.google.com/?q=".$one_univ->address1.','.$one_univ->address2.','.$one_univ->city.','.$one_univ->country;
                }                
                $email_content = array(
                    'schoolname' => $one_fair,
                    'universityname' => $one_univ->university_name,
                    'startdate' => Carbon::createFromFormat('Y-m-d H:i:s',$one_fair->startdate)->toFormattedDateString(),
                    'starttime' => Carbon::createFromFormat('Y-m-d H:i:s',$one_fair->startdate)->format('h:i A'),
                    'endtime' => Carbon::createFromFormat('Y-m-d H:i:s',$one_fair->enddate)->format('h:i A'),                    
                    'googlemaplink'=>$googlemaplink,
                );
            }
            Mail::to($emails_arr)->send(new SchoolFairReminderMail($email_content));
        }      
    }
}
