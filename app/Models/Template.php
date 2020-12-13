<?php


namespace App\Models;


use Framework\Models\Model;

class Template extends Model
{

    protected static string $table = 'templates';

    protected static array $fillable = [
        'id',
        'name',
        'slug'
    ];

    public function pages() {

    }
}