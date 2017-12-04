<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table='users';
    protected $fillable=['username','count'];
    protected $guarded=['id'];
    public $timestamps=false;

    public function recode()
    {
    	return $this->hasMany('App\Models\Recode','user_id');
    }
}
