<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $guarded = [];

    use HasFactory;
   // protected $with=['device.image','image'];

    public function device()
    {
    	return $this->hasMany(Device::class);
    }
     public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
