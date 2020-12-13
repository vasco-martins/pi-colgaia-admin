<?php


namespace App\Models;


use Framework\Models\Model;

class Post extends Model
{

    protected string $table = 'posts';

    protected array $fillable = [
        'id',
        'title',
        'subtitle',
    ];

}