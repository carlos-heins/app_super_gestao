<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome')  . '%')
            ->where('site', 'like', '%' . $request->input('site')  . '%')
            ->where('uf', 'like', '%' . $request->input('uf')  . '%')
            ->where('email', 'like', '%' . $request->input('email')  . '%')
            ->paginate(2);


        return view('app.fornecedor.listar', [
            'fornecedores' => $fornecedores,
            'request' => $request->all()
        ]);
    }

    public function adicionar(Request $request)
    {
        if ($request->input('_token') != '') {
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute é obrigatório',
                'nome.min' => 'O campo nome deve ter entre 3 e 40 caractéres',
                'nome.max' =>  'O campo nome deve ter entre 3 e 40 caractéres',
                'uf.min' => 'O campo nome deve ter exatamente 2 caractéres',
                'uf.max' =>  'O campo nome deve ter exatamente 2 caractéres',
            ];

            $request->validate($regras, $feedback);

            // adição
            if ($request->input('id') == '') {
                $fornecedor = new Fornecedor();
                $fornecedor->create($request->all());

                $msg = "Cadastro Realizado com sucesso!";
            } else { // edição
                $fornecedor = Fornecedor::find($request->input('id'));
                $update = $fornecedor->update($request->all());

                if ($update) {
                    $msg  = 'Edição Realizada com sucesso!';
                } else {
                    $msg = 'Falha ao Editar Fornecedor.';
                }

                return redirect()->route('app.fornecedor.adicionar', ['id' => $request->input("id"), 'msg' => $msg]);
            }
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg??'']);
    }

    public function editar($id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    
    public function excluir($id)
    {
        $fornecedor = Fornecedor::find($id);

        $fornecedor->delete(); 
        return redirect()->route('app.fornecedor');
    }
}
