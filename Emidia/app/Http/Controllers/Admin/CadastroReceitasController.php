<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Models\CadastroReceita;
Use App\Models\CadastroIngrediente;

class CadastroReceitasController extends Controller
{

    private $cadastroReceita;

    public function __construct(CadastroReceita $cadastroReceita)
    {
        $this->cadastroReceita = $cadastroReceita;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $cadastroReceitas = $this->cadastroReceita->all();
                
        return view('admin.cadastro.index', compact(['cadastroReceitas']));
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
    public function store(Request $request, CadastroIngrediente $cadIngredienteModel)
    {   
        
        $dataForm = $request->all();
       
        $insert = $this->cadastroReceita->create($dataForm);
               
       foreach($request->input('name') as $key => $value) {
            $cadIngredienteModel->create(['ingrediente'=> $value,'id_cadastro_receita' => $insert->id]);
        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
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
    }
  
    public function updateDataReceita()
    {
        //
    }

    
}
