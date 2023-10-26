<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static function getrcords()     
    {
        $request = User::select('users.*')
                ->where('user_type', '=', 1)
                ->where('is_delete', '=', 0);
        if (!empty(Request::get('email'))){
            $request = $request->where('email','LIKE','%'. Request::get('email') .'%');
        }
        if (!empty(Request::get('name'))){
            $request = $request->where('name','LIKE','%'. Request::get('name') .'%');
        }
        if (!empty(Request::get('date'))){
            $request = $request->wheredate('created_at','=',Request::get('date'));
        }
        $request = $request->orderBy('id', 'desc')
                            ->paginate(10); 
        return $request;        
            
    }
    static function search()
    {
        
    }
    static function getemailsigle($email)
    {
     return User::where('email','=',$email)->first();
    }
    
    static function edit($id)
    {
     return User::where('id','=',$id)->first();
    }
    
    
}
