<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryPage extends Model
{
    //
    protected $guarded = [];
	protected $fillable = ['id', 'bannertext', 'bannertext1', 'galleryheadertext', 'banner'];
     
}
