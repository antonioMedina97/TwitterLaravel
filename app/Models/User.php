<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getAvatarAttribute($value){

        if ($value != null){
            return asset('/storage/avatars/'.$value);
        }
        else{
            return asset('/images/logo.png');
        }

    }
/*
    public  function setPasswordAttribute($value){

        return $this->attributes['password'] = Hash::make($value);

    }
*/
    //Incluimos todos los tweets del usuario y ademas
    //los de los usuarios a los que sigue
    public function timeline(){

        $idArr = $this->follows()->pluck('id');

        $idArr->push($this->id);


        return Tweet::whereIn('user_id', $idArr)->latest()->get();

    }

    public function tweets(){
        return $this->hasMany(Tweet::class)->latest();
    }

    public function follow($user)
    {

        if ($user instanceof User){

            return $this->follows()->save($user);
        }
        else{

            $column = 'name';

            $userObj =  User::where($column, '=', $user)->first();

            return $this->follows()->save($userObj);
        }

    }

    public function unfollow($user)
    {

        if ($user instanceof User){

            return $this->follows()->detach($user);
        }
        else{

            $column = 'name';

            $userObj =  User::where($column, '=', $user)->first();

            return $this->follows()->detach($userObj);
        }

    }

    public function follows(){

        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');

    }

    public function following( User $user){

        return $this->follows()->where('following_user_id', $user->id)->exists();

    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')->withTimestamps();
    }

    public  function authorizeRoles($roles){

        if ($this->hasAnyRole($roles)){
            return true;
        }
        else{
            return false;
        }
    }

    public  function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }
        else{
            if ($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function hasRole($role){
        if ($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }


    public function getRouteKeyName()
    {
        return 'name';
    }

    public function path($append = ''){

        $ruta = route( 'perfil', $this->name);

        return $append ? "{$ruta}/{$append}" : $ruta;

    }


}


