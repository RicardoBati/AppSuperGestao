<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        
        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato', [
            'motivo_contatos' => $motivo_contatos
        ]);
    }

    public function salvar(Request $request){
        
        //Validações
        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        //feedbacks
        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'email.email' => 'E-mail inválido',
            'email.unique' => 'E-mail informado já esta em uso',
            'mensagem.max' => 'O campo mensagem precisa ter no máximo 2000 caracteres',
            'required' => 'O campo :attribute deve ser preenchido'

        ];
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        
        return redirect()->route('site.index');
    }
}
