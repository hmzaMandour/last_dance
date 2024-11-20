<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    //
    protected $fillable = [
        'team_id',
        'user_id',
        'role'
    ];
}
