<?php


namespace App\Models;


use Framework\Models\Model;

class Message extends Model
{

    protected static string $table = 'messages';

    protected static array $fillable = [
        'name',
        'email',
        'subject',
        'message'
    ];

}