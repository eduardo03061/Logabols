<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable; 
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Nomina;

class RegistrosNomina extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'registros_nomina';
    protected $fillable = [
        'name', 'basura', 'camiseta','id_nomina','jumbo','reempacado','empacado','total'
    ];

    public function nomina(){ 
        return $this->belongsTo(Nomina::class);
    }
}
