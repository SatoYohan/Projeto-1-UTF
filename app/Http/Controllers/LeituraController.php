<?php

namespace App\Http\Controllers;

use App\Models\Leitura;
use App\Models\Local;
use Illuminate\Http\Request;

class LeituraController extends Controller
{
    public function index()
    {
        $leituras = Leitura::with('local')->get();
        return view('leituras.index', compact('leituras'));
    }

    public function create()
    {
        $locais = Local::all();
        return view('leituras.create', compact('locais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_local' => 'required|exists:locais,id',
            'data_e_hora' => 'required|date',
            'dbm_2_4_ghz' => 'required|numeric',
            'dbm_5_ghz' => 'required|numeric',
            'mbps_2_4_ghz' => 'required|numeric',
            'mbps_5_ghz' => 'required|numeric',
            'interferencia_2_4_ghz' => 'required|numeric',
            'interferencia_5_ghz' => 'required|numeric',
        ]);

        Leitura::create($request->all());

        return redirect()->route('leituras.index')->with('success', 'Leitura criada com sucesso.');
    }

    public function show(Leitura $leitura)
    {
        return view('leituras.show', compact('leitura'));
    }

    public function edit(Leitura $leitura)
    {
        $locais = Local::all();
        return view('leituras.edit', compact('leitura', 'locais'));
    }

    public function update(Request $request, Leitura $leitura)
    {
        $request->validate([
            'id_local' => 'required|exists:locais,id',
            'data_e_hora' => 'required|date',
            'dbm_2_4_ghz' => 'required|numeric',
            'dbm_5_ghz' => 'required|numeric',
            'mbps_2_4_ghz' => 'required|numeric',
            'mbps_5_ghz' => 'required|numeric',
            'interferencia_2_4_ghz' => 'required|numeric',
            'interferencia_5_ghz' => 'required|numeric',
        ]);

        $leitura->update($request->all());

        return redirect()->route('leituras.index')->with('success', 'Leitura atualizada com sucesso.');
    }

    public function destroy(Leitura $leitura)
    {
        $leitura->delete();

        return redirect()->route('leituras.index')->with('success', 'Leitura excluída com sucesso.');
    }
}
