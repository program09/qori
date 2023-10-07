<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;
    protected $table = 'tienda';

    protected $fillable = [
        'id',
        'cod_tienda',
        'nombre',
        'direccion',
        'celular',
        'logo',
        'estado',
        'id_user',
    ];


    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    

}
