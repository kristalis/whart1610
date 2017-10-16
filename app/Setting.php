<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];
	protected $fillable = ['id', 'logo', 'facebookurl', 'twitterurl', 'googleurl', 'youtubeurl', 'adminemail'];


   public function pages()
    {
        return $this->hasMany('App\Page','settings_id');
    }
        

}
