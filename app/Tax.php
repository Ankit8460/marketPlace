<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'taxName','taxAmount'
    ];

    protected $table = "tax";
    
    protected $primaryKey = 'taxId';
}
