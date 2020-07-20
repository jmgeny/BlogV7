<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;

class Post extends Model
{
	protected $fillable = [
        'name', 'slug', 'excerpt','description','status','file','user_id','category_id'
    ];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }

    public function image(){

        return $this->morphOne(Image::class,'imageable');
        
    }    
    
}
