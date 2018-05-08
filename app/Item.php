<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Catagory;

class Item extends Model
{
	protected $fillable = [ 'title', 'sub_title', 'image', 'price', 'catagory_id' ];

    public function catagory(){

    	return $this->belongsTo(Catagory::class);
    }
}
