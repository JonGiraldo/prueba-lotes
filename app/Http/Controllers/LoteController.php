<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;

class LoteController extends Controller
{

    public function index()
    {
        $limite = now()->subMonths(18)->format('ym');

        $lotes = Lote::all()->map(function($lote) use ($limite){

            if($lote->lote <= $limite){
                $lote->vencido = true;
            }else{
                $lote->vencido = false;
            }

            return $lote;

        });

        return response()->json($lotes);
    }

    public function update(Request $request, $id)
    {
        $lote = Lote::find($id);

        $lote->estado = $request->estado;
        $lote->observaciones = $request->observaciones;

        $lote->save();

        return response()->json(['ok'=>true]);
    }

    

}