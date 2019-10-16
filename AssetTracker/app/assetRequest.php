<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assetRequest extends Model
{
    protected $table = 'newassetrequests';
    public $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
