<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roman extends Model
{
    
    protected $fillable = [
        'roman_conversion_id', 'integer_value','roman_letter','created_at','updated_at'
    ];

}
