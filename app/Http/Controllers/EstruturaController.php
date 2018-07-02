<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstruturaRequest;
use App\Estrutura;
use App\Produto;
use Validator;

class EstruturaController extends Controller
{
    public function index()
    {
        $estruturas = Estrutura::all();
        return view('estruturas.index', compact(['estruturas']));
    }

    public function create()
    {
        $produtos = Produto::all(['codigo', 'descricao']);
        return view('estruturas.new', compact('produtos'));
    }

    public function store(EstruturaRequest $request)
    {
        $estruturaData = $request->all();
        $request->validated();

        $retorno = $this->validaPaiFilho($estruturaData['codigo_pai'], $estruturaData['codigo_filho'], $estruturaData);
        if (!is_null($retorno))
            return $retorno;
        $estrutura = new Estrutura();
        $estrutura->create($estruturaData);

        //$produto->estruturas()->create($estruturaData);

        flash('Estrutura criada com sucesso')->success();
        return redirect()->route('estrutura.index');
    }

    private function validaPaiFilho($pai, $filho, $estruturaData){
        if($pai == $filho ) {
            $validator = Validator::make($estruturaData, []);
            $validator->errors()->add("codigos_iguais", 'Código pai e código filho não podem ser iguais.');

            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Estrutura $estrutura)
    {
        $produtos = Produto::all();
        return view('estruturas.edit', compact(['estrutura', 'produtos']));
    }

    public function update(EstruturaRequest $request, $estrutura)
    {
        $estruturaData = $request->all();
        $request->validated();
        $retorno = $this->validaPaiFilho($estruturaData['codigo_pai'], $estruturaData['codigo_filho'], $estruturaData);
        if (!is_null($retorno))
            return $retorno;

        $estrutura = Estrutura::findOrFail($estrutura);
        $estrutura->update($estruturaData);
        flash('Estrutura atualizada com sucesso')->success();
        return redirect()->route('estrutura.index');
    }

    public function destroy($id)
    {
        $estrutura = Estrutura::findOrFail($id);
        $estrutura->delete();
        flash('Estrutura removida com sucesso')->success();
        return redirect()->route('estrutura.index');
    }
}
