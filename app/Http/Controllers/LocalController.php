<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function index()
    {
        $locais = Local::all();
        return view('locais.index', compact('locais'));
    }

    public function create()
    {
        return view('locais.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_do_local' => 'required|string',
            'distancia_roteador' => 'required|string',
        ]);

        Local::create($request->all());

        return redirect()->route('locais.index')->with('success', 'Local criado com sucesso.');
    }

    public function show(Local $local)
    {
        return view('locais.show', compact('local'));
    }

    public function edit(Local $local)
    {
        return view('locais.edit', compact('local'));
    }

    public function update(Request $request, Local $local)
    {
        $request->validate([
            'nome_do_local' => 'required|string',
            'distancia_roteador' => 'required|string',
        ]);

        $local->update($request->all());

        return redirect()->route('locais.index')->with('success', 'Local atualizado com sucesso.');
    }

    public function destroy(Local $local)
    {
        $local->delete();

        return redirect()->route('locais.index')->with('success', 'Local excluído com sucesso.');
    }
}
