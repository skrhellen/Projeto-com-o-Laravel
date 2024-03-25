<?php

namespace App\Http\Controllers;

use App\Models\Joia;
use App\Models\Categoria;
use Illuminate\Http\Request;

class JoiaController extends Controller
{
    public function index()
    {
        $dados = Joia::all();

        return view("joia.list", ["dados" => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view("joia.form",['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //$request é usado para acessar e manipular os dados enviados pelo usuário. 
    {
        //app/http/Controller

        $request->validate([
            'nome' => "required|max:100",
            'material' => "required",
            'categoria_id' => "required",
            'valor' => "required",
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' => "Só é permitido 100 caracteres",
            'material.required' => "O :attribute é obrigatório",
            'categoria_id.required' => "O :attribute é obrigatório",
            'valor.required' => "O :attribute é obrigatório",
            
        ]);

        Joia::create(
            [
                'nome' => $request->nome,
                'material' => $request->material,
                'valor' => $request->valor,
                'categoria_id' => $request->categoria_id,
            ]
        );
        return redirect('joia');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dado = Joia::findOrFail($id);

        $categorias = Categoria::all();

        return view("joia.form", [
            'dado' => $dado,
            'categorias'=> $categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nome' => "required|max:100",
            'material' => "required",
            'categoria_id' => "required",
            'valor' => "required",
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' => "Só é permitido 100 caracteres",
            'material.required' => "O :attribute é obrigatório",
            'categoria_id.required' => "O :attribute é obrigatório",
            'valor.required' => "O :attribute é obrigatório",
            
        ]);
        Joia::updateOrCreate(
            ['id' => $request->id],
            [
                'nome' => $request->nome,
                'material' => $request->material,
                'valor' => $request->valor,
                'categoria_id' => $request->categoria_id,
            ]
        );

        return redirect('joia');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) //DEFINIU O PARAMETRO id
    {
        $dado = Joia::findOrFail($id); //busca um registro com o ID fornecido
        // dd($dado);
        $dado->delete();

        return redirect('joia'); //rediciona parade volta para a opagia de joia
    }

    //campo de busca
    public function search(Request $request)
    {
        if (!empty($request->nome)) { //'!empty' verifica se uma variável está vazia ou não
            $dados = Joia::where(
                "nome",
                "like",
                "%" . $request->nome . "%" //% é um caractere curinga em consultas SQL que indica que pode haver qualquer coisa antes ou depois do valor de nome
            )->get(); //executa a cosulta
        } else {
            $dados = Joia::all(); //mostra todas as instancias da classse 'joia' no banco de dados sem filtros
        }

        return view("joia.list", ["dados" => $dados]);
    }
}
