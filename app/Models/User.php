<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function posts()
    {
        //select * from posts Where created_by = $user->id
        return $this->hasMany(Post::class, 'created_by');
    }

    public static function count($userId) 
    {
        return DB::table('posts')->where('created_by', $userId)->count();
        // return Post::where('created_by', $userId)->count();
    }

    //  public static function search($searchTerm) 
    // {
    //     // return DB::table('posts')->where('created_by', $userId)->count();
    //     return static::where('name', 'LIKE', "%{$searchTerm}%")->orWhere('email', 'LIKE', "%{$searchTerm}%");
    // }

    // public static function search(Request $request) 
    // {
    //     // return DB::table('posts')->where('created_by', $userId)->count();
    //     $searchByUser = App\Model\Post::where('user', '=', $user);
    //     return Post::where('user', '=', $user)->search();
    // }
}
