<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CadastroReceita;
Use App\Models\CadastroIngrediente;

class ListaReceitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $totalPaginacao = 10;
    private $cadastroReceita;

    public function __construct(CadastroReceita $cadastroReceita)
    {
        $this->cadastroReceita = $cadastroReceita;
    }

    public function index()
    {        
        $cadastroReceitas = $this->cadastroReceita->paginate($this->totalPaginacao);
        
        return view('admin.listareceitas.index', compact('cadastroReceitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cadastroReceitas = $this->cadastroReceita->paginate($this->totalPaginacao);
        
        return view('admin.listareceitas.index', compact('cadastroReceitas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, CadastroIngrediente $cadIngredienteModel)
    {        
        $cadastroReceitas = $this->cadastroReceita->find($id);
        $cadIngredientes = $cadIngredienteModel->where('id_cadastro_receita', $id)->get();
        
        return view('admin.visualizar.index', compact(['cadastroReceitas', 'cadIngredientes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, CadastroIngrediente $cadIngredienteModel)
    {
        $cadastroReceitas = $this->cadastroReceita->find($id);
        $cadIngredientes = $cadIngredienteModel->where('id_cadastro_receita', $id)->get();

       // $update = $cadastroReceitas->update();
        
        return view('admin.edite.index', compact(['cadastroReceitas', 'cadIngredientes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, CadastroIngrediente $cadIngredienteModel)
    {
        $dataForm = $request->all();

        $cadastroReceitas = $this->cadastroReceita->find($id);

        $cadIngredientes = $cadIngredienteModel->where('id_cadastro_receita', $id)->get();

        $insert = $cadastroReceitas->update($dataForm);
               
        foreach($request->input('name') as $key => $value) {
            // $cadIngredientes->update(['ingrediente'=> $value);
         }
 
         return view('admin.home.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       
        $idReceita = $this->cadastroReceita->find($id);

        $delete = $idReceita->delete();

        $cadastroReceitas = $this->cadastroReceita->all();
        
        return view('admin.home.index');
    }
}
