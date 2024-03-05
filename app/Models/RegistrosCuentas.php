<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Nomina;

class RegistrosCuentas extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'registros_cuentas';
    protected $fillable = [
        'id_cliente', 'importe', 'movimiento','fecha'
    ];

    
}
