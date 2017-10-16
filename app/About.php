<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
        //
    protected $guarded = [];
	protected $fillable = ['id', 'chefname','chefimage','chefdesc'];




public function galleryImages()
{
	return $this->hasMany('App\Gallery', 'pageid');
}

public function contactDetails()
{
	return $this->hasMany('App\Contact', 'pageid');
}

}
