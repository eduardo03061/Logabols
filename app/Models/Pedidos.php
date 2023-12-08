<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\RegistrosPedidos;

class Pedidos extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'pedidos';

    protected $fillable = [
        'id', 'fecha', 'total'
    ];

    public function registro()
    {
        return $this->hasMany(RegistrosPedidos::class);
    }
}
