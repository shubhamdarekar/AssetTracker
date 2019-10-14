<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assetRequest extends Model
{
    protected $table = 'assetRequests';
    public $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
