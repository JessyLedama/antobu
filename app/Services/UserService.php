<?php

namespace App\Services;

use App\Models\User;
use App\Services\StatusService;

class UserService
{
    /**
     *  Get all active users
     */
    public static function users()
    {
        $status = StatusService::active();

        $users = User::where('status_id', $status->id)->get();

        return $users;
    }

    /**
     *  Store a new user
     */
    public static function store($validated)
    {
        
    }
}