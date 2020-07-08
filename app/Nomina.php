<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\RegistrosNomina;

class Nomina extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'nomina';

    protected $fillable = [
        'id', 'fecha'
    ];

     public function registro(){ 
        return $this->hasMany(RegistrosNomina::class);
    }

}
