<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $fillable = ['id', 'bannertext', 'bannertext1', 'headertext', 'banner', 'settings_id'];


	public function setting()
	{
		return $this->belongsTo('App\Setting','settings_id');
	}

}
