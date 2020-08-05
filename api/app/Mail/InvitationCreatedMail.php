<?php

namespace App\Mail;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class InvitationCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invitation;
    public $url;

    /**
     * @param Invitation $invitation
     */
    public function __construct(Invitation $invitation)
    {
        $this->invitation = $invitation;
        $user = User::select('id')->where('university_id',$invitation->university_id)->get()->first();
        $this->url = URL::temporarySignedRoute(
            'university_invitation_register', now()->addDay(), [
            'user_id'       => $user!=null?$user->id:0,
            'invitation_id' => $invitation->id
        ]);
        Log::debug($this->url);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'))
            ->view('emails.invitation.created');
    }
}
