<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Roles;

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
        'Rol',
        'company_id'
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
    ];
    public function roles()
    {
      return $this->belongsToMany(Roles::class,'role_user');
    }
    public function authorizeRoles($roles){
        if (is_array($roles)) {
          return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
      }
  
      public function authorizeRolesWithId($roles){
     
        if (is_array($roles)) {
          return $this->hasAnyRoleWithId($roles) || abort(401, 'This action is unauthorized.');
        }
        return $this->hasRoleWithId($roles) || abort(401, 'This action is unauthorized.');
      }
  
      /*** Check multiple roles* @param array $roles*/
      public function hasAnyRoleWithId($roles){
        
        return null !== $this->roles()->whereIn('roles.id', $roles)->first();
      }
  
      /*** Check multiple roles* @param array $roles*/
      public function hasAnyRole($roles){
        return null !== $this->roles()->whereIn('name', $roles)->first();
      }
     
    
}
