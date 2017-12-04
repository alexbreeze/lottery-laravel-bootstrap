<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
	protected $table='awards';
    protected $fillable=['awardname','count'];
    protected $guarded=['id'];
    public $timestamps=false;

    public function recode()
    {
    	return $this->hasOne('App\Models\Recode','award_id');
    }
}
