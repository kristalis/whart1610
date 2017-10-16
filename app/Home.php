<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    //
    protected $guarded = [];
	protected $fillable = ['id', 'openingtimes','homeaddress','specials', 'bookingtype', 'opentableid', 'emailid', 'customerreview', 'cusatomerreview', 'customername'];
}
