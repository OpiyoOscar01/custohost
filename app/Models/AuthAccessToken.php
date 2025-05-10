<?php

namespace App\Models;


use Laravel\Sanctum\PersonalAccessToken;

class AuthAccessToken extends PersonalAccessToken
{
    protected $connection = 'auth_db';
    protected $table = 'personal_access_tokens';

}
