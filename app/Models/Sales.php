<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Sales extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'sales';

    protected $fillable = [
        'id','name', 'id_user', 'bulks','unidades', 'kg', 'type','date'
    ];


}
