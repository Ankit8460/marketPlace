<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bankaccounts extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bankaccounts';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'accountId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bankId', 'employeeId', 'bankAccName','accountNo'];

    public function country() {
        return $this->belongsTo('App\Currency');
    }

}
