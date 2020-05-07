<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $table = 'deal';
    protected $primaryKey = 'idDeal';


    protected $fillable = [
        'description'
    ];

    public $timestamps = false;


    protected $hidden = [];


    protected $casts = [

    ];
}
