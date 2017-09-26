<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_token extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id','deviceToken','deviceType','token','token_exp_time','X_api_key'
    ];

    protected $table = "customer_token";
    
    protected $primaryKey = 'customer_token_id';

}