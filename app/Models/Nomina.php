<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'id', 'fecha', 'total'
    ];

    public function registro()
    {
        return $this->hasMany(RegistrosNomina::class);
    }
}
