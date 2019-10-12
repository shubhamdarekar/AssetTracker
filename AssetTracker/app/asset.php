<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
    protected $table = 'assets';
    public $primaryKey = 'id';

    public function users(){
        return $this->belongsTo('App\User');
    }
}
