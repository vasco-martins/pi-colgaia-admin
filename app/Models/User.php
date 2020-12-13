<?php


namespace App\Models;


use Framework\Models\Model;

class User extends Model
{

    protected static string $table = 'users';

    protected static array $fillable = [
        'id',
        'name',
        'email',
        'password',
        'active'
    ];

}