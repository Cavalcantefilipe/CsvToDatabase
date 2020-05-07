<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'idOrder';


    protected $fillable = [
        'idClient',
        'idDeal',
        'date',
        'accepted',
        'rejected'
    ];

    public $timestamps = false;


    protected $hidden = [];


    protected $casts = [

    ];
}
