<?php

namespace App\Http\Controllers;

use App\Models\Associado;
use App\Models\Anuidade;
use Illuminate\Http\Request;

class AssociadoController extends Controller
{
    public function cadastrarAssociado(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:associados,email',
            'cpf' => 'required|string|max:14|unique:associados,cpf',
            'data_filiacao' => 'required|date',
        ]);

        $associado = Associado::create($request->all());

        // Opcionalmente, podemos também associar as anuidades devidas ao novo associado aqui.

        return response()->json(['message' => 'Associado cadastrado com sucesso.']);
    }

    public function listarAssociadosEmDia()
    {
        $associados = Associado::where('data_filiacao', '<=', now())
            ->whereDoesntHave('anuidadesDevidas', function ($query) {
                $query->where('pago', false);
            })->get();

        return response()->json($associados);
    }

    public function listarAssociadosEmAtraso()
    {
        $associados = Associado::where('data_filiacao', '<=', now())
            ->whereHas('anuidadesDevidas', function ($query) {
                $query->where('pago', false);
            })->get();

        return response()->json($associados);
    }

    public function realizarPagamento(Request $request, Associado $associado)
    {
        $request->validate([
            'anuidades' => 'required|array',
            'anuidades.*' => 'exists:anuidades,id',
        ]);

        foreach ($request->anuidades as $anuidade_id) {
            $associado->anuidadesPagas()->attach($anuidade_id, ['pago' => true]);
        }

        return response()->json(['message' => 'Pagamento realizado com sucesso.']);
    }
}
