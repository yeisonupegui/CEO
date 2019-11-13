<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Proyecto extends Model
{
    //
    protected $table ='proyecto';
    protected $primaryKey ='idproyecto';
    public $timestamps=false;

    protected $fillable=[
        'nombreproyecto',
        'descripcion',
        
    ];

    protected $guarded =[

    ];
}
