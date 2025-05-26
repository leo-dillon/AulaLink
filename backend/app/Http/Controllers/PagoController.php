<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'usuario_id' => 'required|exists:users,ID_Usuario',
            'monto' => 'required|numeric',
            'metodo_pago' => 'required|in:Transferencia,Tarjeta',
            'cbu' => 'nullable|string',
            'titular' => 'nullable|string',
            'numero_tarjeta' => 'nullable|string',
            'dni' => 'nullable|string',
            'vencimiento' => 'nullable|string',
        ]);

        $pago = Pago::create($validated);

        return response()->json([
            'message' => 'Pago registrado exitosamente',
            'data' => $pago
        ], 201);
    }
}
