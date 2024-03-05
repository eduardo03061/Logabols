<?php

namespace App\Models;
  
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\RoleUser;

class Roles extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'roles';
    protected $fillable = [
        'name','descriptions'
    ];

    public function users()
    {
      return $this->belongsToMany(User::class)
                    ->using(RoleUser::class)
                      ->withPivot([
                        'roles_id',
                        'users_id'
                      ]);
                      
    }

}


 