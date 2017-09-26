<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model {
public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'currency';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'currencyId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['countryName', 'countryCode', 'currencyName', 'currencyCode','status'];
    protected $appends = array('logo16', 'logo24', 'logo32', 'logo48', 'logo128');

    public function getLogo16Attribute() {
        if ($this->flagImg) {
            return URL('/storage/uploads/flag_images/') . "/" . $this->flagImg;
        } else {
            return '';
        }
    }

    public function getLogo24Attribute() {
        if ($this->flagImg) {
            return URL('/storage/uploads/flag_images/') . "/" . $this->flagImg;
        } else {
            return '';
        }
    }

    public function getLogo128Attribute() {
        if ($this->flagImg) {
            return URL('/storage/uploads/flag_images/') . "/" . $this->flagImg;
        } else {
            return '';
        }
    }

    public function getLogo32Attribute() {
        if ($this->flagImg) {
            return URL('/storage/uploads/flag_images/') . "/" . $this->flagImg;
        } else {
            return '';
        }
    }

    public function getLogo48Attribute() {
        if ($this->flagImg) {
            return URL('/storage/uploads/flag_images/') . "/" . $this->flagImg;
        } else {
            return '';
        }
    }

    public static function csv_to_array($filename = '', $delimiter = ',') {
        if (!file_exists($filename) || !is_readable($filename))
            return FALSE;

        $header = ['countryName', 'countryCode', 'currencyName', 'currencyCode'];
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }

    public function scopeSearchByKeyword($query, $keyword) {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where("countryName", "LIKE", "%$keyword%")
                        ->orWhere("countryCode", "LIKE", "%$keyword%")
                        ->orWhere("currencyName", "LIKE", "%$keyword%")
                        ->orWhere("currencyCode", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }

}
