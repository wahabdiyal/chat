<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
	 
	protected $guarded = [];
    
    use HasFactory;

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // public function getNameAttribute($value)
    // {
    //     return ucfirst($value);
    // }
    public function getDescriptionAttribute($value)
    {
        return ucfirst($value);
    }
    public function getNameAttribute()
{
    return ucfirst($this->attributes['name']);
}
public function setNameAttribute($value)
{
    $this->attributes['name'] = 'wahab'.$value;
}

   
}
