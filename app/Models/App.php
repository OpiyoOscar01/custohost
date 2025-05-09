<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    /** @use HasFactory<\Database\Factories\AppFactory> */
    use HasFactory;
    protected $table = 'apps';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $fillable = [
        'name',
        'slug',
        'base_url',
        'icon_url',
        'description',
        'status',
    ];

 
}
