<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recode extends Model
{
    protected $table='recodes';
    protected $fillable=['user_id','award_id'];
    protected $guarded=['id'];

    public function award()
    {
    	return $this->belongsTo('App\Models\Award','award_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User','user_id');
    }
}
