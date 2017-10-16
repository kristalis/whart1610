<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $guarded = [];
	protected $fillable = ['id', 'branchname', 'address', 'location', 'county', 'postcode', 'fax', 'phone','email','loctype', 'googlemap'];

	public function page()
	{
		return $this->belongsTo('App\Page','page_id');
	}
}

