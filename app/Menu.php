<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
 	protected $guarded = [];
	protected $fillable = ['id', 'menutitle','menuimage','menufile'];
}
