<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Clientes extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'clientes';

    protected $fillable = [
        'id','clave', 'nombres', 'apellidos', 'telefono','email', 'direccion','company_id'
    ];


}
