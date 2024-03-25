<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Venda::all();

        return view("vendas.list", ["dados" => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente' => "required|max:100",
            'cpf' => "required|max:11",
            'nomej' => "required",
        ], [
            'cliente.required' => "O :attribute é obrigatório",
            'cliente.max' => "Só é permitido 100 caracteres",
            'cpf.required' => "O :attribute é obrigatório",
            'cpf.max' => "Só é permitido 8 caracteres",
            'nomej.required' => "O :attribute é obrigatório",
            
        ]);

        Venda::create(
            [
                'cliente' => $request->cliente,
                'cpf' => $request->cpf,
                'nomej' => $request->nomej,
            ]
        );
        return redirect('vendas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dado = Venda::findOrFail($id);

        return view("vendas.form", [
            'dado' => $dado,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venda $venda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venda $venda)
    {
        $request->validate([
            'cliente' => "required|max:100",
            'cpf' => "required|max:11",
            'nomej' => "required",
        ], [
            'cliente.required' => "O :attribute é obrigatório",
            'cliente.max' => "Só é permitido 100 caracteres",
            'cpf.required' => "O :attribute é obrigatório",
            'cpf.max' => "Só é permitido 8 caracteres",
            'nomej.required' => "O :attribute é obrigatório",
            
        ]);

        Venda::updateOrCreate(
            [
                'cliente' => $request->cliente,
                'cpf' => $request->cpf,
                'nomej' => $request->nomej,
            ]
        );
        return redirect('vendas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $dado = Venda::findOrFail($id); //busca um registro com o ID fornecido

        $dado->delete();

        return redirect('vendas'); 
    }

    //campo de busca
    public function search(Request $request)
    {
        if (!empty($request->nome)) { //'!empty' verifica se uma variável está vazia ou não
            $dados = Venda::where(
                "nome",
                "like",
                "%" . $request->nome . "%" //% é um caractere curinga em consultas SQL que indica que pode haver qualquer coisa antes ou depois do valor de nome
            )->get(); //executa a cosulta
        } else {
            $dados = Venda::all(); //mostra todas as instancias da classse 'joia' no banco de dados sem filtros
        }

        return view("venda.list", ["dados" => $dados]);
    }
}
