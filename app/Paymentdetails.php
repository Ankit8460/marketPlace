<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentdetails extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employeeId','adminId','currencyId','payPeriod','payLastDate','wages','taxWithheld','otherwages','netPayment','payStatus','totalWages','payDate'
    ];

    protected $table = "paymentdetails";
    
    protected $primaryKey = 'payId';
}
