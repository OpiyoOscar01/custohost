<?php

namespace App\Models;

use Faker\Provider\ar_EG\Person;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken;

class AuthAccessToken extends PersonalAccessToken
{
    protected $connection = 'auth_db';
    protected $table = 'personal_access_tokens';

}
