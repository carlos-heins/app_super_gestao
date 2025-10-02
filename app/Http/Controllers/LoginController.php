<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        if (@$request->get('erro') == 1) {
            $erro = 'Usuário e ou senha incorretos.';
        }
        if (@$request->get('erro') == 2) {
            $erro = 'Faça login para ter acesso ao site.';
        }
        return view('site.login', [
            'titulo' => 'Login',
            'erro' => $erro
        ]);
    }

    public function autenticar(Request $request)
    {
        // regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (email) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();

        $userExiste = $user->where('email', $email)->where('password', $password)->get()->first();

        if (isset($userExiste->name)) {
            session_start();
            $_SESSION['nome'] = $userExiste->name;
            $_SESSION['email'] = $userExiste->email;

            return redirect()->route('app.clientes');
        }

        return redirect()->route('site.login', ['erro' => 1]);
    }
}
