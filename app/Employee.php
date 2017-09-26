<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bankId','adminId','firstName','lastName','otherName','birthDate','birthMonth','birthYear','gender','address','email','dateOfHire','salaryAmount','position','employeeType','workLocation','mobileNo','title','monthlySalary','yearlySalary','monthlyTax','yearlyTax','payPeriod','payDate','totalPay','vacationStatus'
    ];

    protected $table = "employee";
    
    protected $primaryKey = 'employeeId';
}
