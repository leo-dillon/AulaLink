<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';
    protected $primaryKey = 'ID_Pago';

    protected $fillable = [
        'usuario_id',
        'monto',
        'metodo_pago',
        'cbu',
        'titular',
        'numero_tarjeta',
        'dni',
        'vencimiento',
        'fecha_pago',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id_user');
    }
}
