<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller
{
    private $product;
    private $totalPage = 5;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem de Produtos';

        $products = $this->product->paginate($this->totalPage);

        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar novo Produto';
        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.products.create-edit', compact('title', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $dataForm = $request->all();

        $dataForm['active'] = (!isset($dataForm['active']) ) ? 0 : $dataForm['active'];

        $insert = $this->product->create($dataForm);
        
        if($insert)
            return redirect()->route('produtos.index');
        else
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
        $dataProduto = $this->product->find($id);

        $title = "Produto: {$dataProduto->name}";
        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.products.show', compact('title', 'categorys', 'dataProduto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataProduto = $this->product->find($id);

        $title = "Editar Produto: {$dataProduto->name}";
        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.products.create-edit', compact('title', 'categorys', 'dataProduto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        $dataForm = $request->all();

        $dataForm['active'] = (!isset($dataForm['active']) ) ? 0 : $dataForm['active'];

        $dados_prod = $this->product->find($id);
        
        $update = $dados_prod->update($dataForm);
        
        if($update)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.edit', $id)->with(['errors' => 'Falha ao Editar!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados_prod = $this->product->find($id);

        $delete = $dados_prod->delete();

        if($delete)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.show', $id)->with(['errors' => 'Falha ao Deletar!']);
    }    
}
