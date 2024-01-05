<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Inventory extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'inventory';

    protected $fillable = [
        'id','name', 'id_user', 'bulks', 'kg', 'type','date'
    ];


}
