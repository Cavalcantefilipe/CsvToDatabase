<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'idClient';


    protected $fillable = [
        'name'
    ];

    public $timestamps = false;


    protected $hidden = [];


    protected $casts = [

    ];
}
