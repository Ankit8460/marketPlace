<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'banks';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'BankId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bankName', 'currencyId', 'bankCode','accountNo'];

    public function country() {
        return $this->belongsTo('App\Currency');
    }

}
