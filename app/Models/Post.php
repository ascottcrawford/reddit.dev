<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public static $rules = [
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'url' => 'required|url'
        ];

    // public function user()
    // {
    // 	return $this->belongsTo('App/User', 'created_by', 'id');
    // }

    // public function getTitleAttribute($value)
    // {
    // 	return ucwords($value);
    // }

    //   public function setTitleAttribute($value)
    // {
    // 	$this->attributes['title'] = strtolower($value);
    // }
 //    public function __get($name) {
 //    	if (condition)
	// {
	// 	return $this->getTitleAttribute($this->attributes[$name]);
	// }   
	public function author() 
	{
		//select * from users WHERE id = $post->created-by
		return $this->belongsTo(User::class, 'created_by');
	}

	 public static function search($searchTerm) 
    {
        // return DB::table('posts')->where('created_by', $userId)->count();
        return Post::select(
	        	'posts.id',
	        	'posts.title',
	        	'posts.url',
	        	'posts.content',
	        	'posts.created_at',
	        	'users.name'
        	)
        	->join('users', 'users.id', '=', 'posts.created_by')
        	->where('title', 'LIKE', "%{$searchTerm}%")
        	->orWhere('content', 'LIKE', "%{$searchTerm}%")
        	->orWhere('users.name', 'LIKE', "%{$searchTerm}%")
        	->paginate(4)
    	;
    }
}
