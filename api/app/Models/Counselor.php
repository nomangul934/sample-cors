<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email', 'mobile','school_id'
    ];

    /**
     * university's user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /*    
    public function user() {
        return $this->belongsTo(User::class);
    }
    */

    /**
     * university's invitations
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invitations() {
        return $this->hasMany(Invitation::class);
    }
}
