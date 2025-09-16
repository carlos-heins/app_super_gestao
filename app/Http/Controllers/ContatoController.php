<?php

namespace App\Http\Controllers;

use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação',
        ];

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|min:3|max:40|unique:site_contatos', // validações separadas por |
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000'
            ],
            [
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
                'email.email' => 'O campo email deve ser válido.',
                'mensagem.max' => 'O campo mensagem deve ter no máximo 2000 caracteres.',
                'required' => 'O campo :attribute é obrigatório.' // atribuição para o required com o nome como atributo
            ]
        );
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
