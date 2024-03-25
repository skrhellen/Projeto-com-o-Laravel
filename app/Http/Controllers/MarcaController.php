<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    
    public function index()
    {
        $dados = Marca::all();

        return view("marca.list", ["dados" => $dados]);
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
            'marca' => "required|max:100",
            'cep' => "required|max:8",
            'avaliacao' => "required",
        ], [
            'marca.required' => "O :attribute é obrigatório",
            'marca.max' => "Só é permitido 100 caracteres",
            'cep.required' => "O :attribute é obrigatório",
            'cep.max' => "Só é permitido 8 caracteres",
            'avaliacao.required' => "O :attribute é obrigatório",
            
        ]);

        Marca::create(
            [
                'marca' => $request->marca,
                'cep' => $request->cep,
                'avaliacao' => $request->avaliacao,
            ]
        );
        return redirect('marca');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dado = Marca::findOrFail($id);

        return view("marca.form", [
            'dado' => $dado,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'marca' => "required|max:100",
            'cep' => "required|max:8",
            'avaliacao' => "required",
        ], [
            'marca.required' => "O :attribute é obrigatório",
            'marca.max' => "Só é permitido 100 caracteres",
            'cep.required' => "O :attribute é obrigatório",
            'cep.max' => "Só é permitido 8 caracteres",
            'avaliacao.required' => "O :attribute é obrigatório",
            
        ]);
        Marca::updateOrCreate(
            [
                'marca' => $request->marca,
                'cep' => $request->cep,
                'avaliacao' => $request->avaliacao,
            ]
        );
        return redirect('marca');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dado = Marca::findOrFail($id); //busca um registro com o ID fornecido

        $dado->delete();

        return redirect('marca'); 
    }

    //campo de busca
    public function search(Request $request)
    {
        if (!empty($request->nome)) { //'!empty' verifica se uma variável está vazia ou não
            $dados = Marca::where(
                "nome",
                "like",
                "%" . $request->nome . "%" //% é um caractere curinga em consultas SQL que indica que pode haver qualquer coisa antes ou depois do valor de nome
            )->get(); //executa a cosulta
        } else {
            $dados = Marca::all(); //mostra todas as instancias da classse 'joia' no banco de dados sem filtros
        }

        return view("marca.list", ["dados" => $dados]);
    }
}
