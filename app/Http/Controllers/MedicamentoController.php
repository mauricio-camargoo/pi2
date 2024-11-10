<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicamentoRequest;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicamentos = Medicamento::paginate(10);
        return view('admin.medicamentos.index', compact('medicamentos'));
    }

    public function create()
    {
        return view('admin.medicamentos.create');
    }

    public function store(StoreMedicamentoRequest $request){
        Medicamento::create($request->validated());
        return redirect()->route('medicamentos.index')
                         ->with('success', 'Medicamento criado com sucesso!');
    }

    public function show(string $id){
        if (!$medicamento = Medicamento::find($id)) {
            return redirect()->route('medicamentos.index')->with('warning', 'Medicamento não localizado!');
        }
        return view('admin.medicamentos.show', compact('medicamento'));
    }

    public function edit(string $id){
        if (!$medicamento = Medicamento::find($id)) {
            return redirect()->route('medicamentos.index')->with('warning', 'Medicamento não localizado!');
        }
        return view('admin.medicamentos.edit', compact('medicamento'));
    }

    public function update(Request $request, string $id){
        if (!$medicamento = Medicamento::find($id)) {
            return back()->with('warning', 'Medicamento não localizado!');
        }

        $medicamento->update($request->all());
        return redirect()
                ->route('medicamentos.index')
                ->with('success', 'Medicamento atualizado com sucesso!');
    }

    public function destroy(string $id){
        if (!$medicamento = Medicamento::find($id)) {
            return redirect()->route('medicamentos.index')->with('warning', 'Medicamento não localizado!');
        }else{
            $medicamento->delete();
        }

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento APAGADO!');
    }
}
