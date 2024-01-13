<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Nomina;

class RegistrosSales extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'registros_sales';
    protected $fillable = [
        'name', 'id_sales', 'bulks','kg','id_item','price','unidades'
    ];

    public function nomina(){
        return $this->belongsTo(Nomina::class);
    }
}
