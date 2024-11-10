<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserMedicamentoRequest;
use App\Models\Medicamento;
use App\Models\User;
use App\Models\UserMedicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class UserMedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = DB::table('user_medicamentos')
                    ->join('users','user_medicamentos.id_usuario','users.id')
                    ->join('medicamentos','user_medicamentos.id_medicamento','medicamentos.id')
                    ->select('user_medicamentos.*','users.name as nome_usuario','medicamentos.medicamento as nome_med')
                    ->paginate(10);
        return view('admin.usersMedicamentos.index', compact('dados'));
    }

    public function create()
    {
        $users = User::all()->where('permission','!=','adm');
        $medicamentos = Medicamento::all();
        return view('admin.usersMedicamentos.create', compact('users','medicamentos'));
    }

    public function store(StoreUserMedicamentoRequest $request){
        UserMedicamento::create($request->validated());
        return redirect()->route('usersmedicamentos.index')
                         ->with('success', 'Registrado com sucesso!');
    }

    public function show(string $id){
        if (!$usermedicamento = UserMedicamento::find($id)) {
            return redirect()->route('usersmedicamentos.index')->with('warning', 'Registro não localizado!');
        }
        $usermedicamento = DB::table('user_medicamentos')
        ->join('users','user_medicamentos.id_usuario','users.id')
        ->join('medicamentos','user_medicamentos.id_medicamento','medicamentos.id')
        ->select('user_medicamentos.*','users.name as nome_usuario','medicamentos.medicamento as nome_med')
        ->where('user_medicamentos.id','=',$id)
        ->first();
        return view('admin.usersMedicamentos.show', compact('usermedicamento'));
    }

    public function edit(string $id){
        if (!$usermedicamento = UserMedicamento::find($id)) {
            return redirect()->route('usersmedicamentos.index')->with('warning', 'Registro não localizado!');
        }
        $users = User::all();
        $medicamentos = Medicamento::all();
        $usermedicamento = DB::table('user_medicamentos')
        ->join('users','user_medicamentos.id_usuario','users.id')
        ->join('medicamentos','user_medicamentos.id_medicamento','medicamentos.id')
        ->select('user_medicamentos.*','users.name as nome_usuario','medicamentos.medicamento as nome_med')
        ->where('user_medicamentos.id','=',$id)
        ->first();
        // dd($usermedicamento);

        return view('admin.usersMedicamentos.edit', compact('usermedicamento','users','medicamentos'));
    }

    public function update(Request $request, string $id){
        if (!$usermedicamento = UserMedicamento::find($id)) {
            return back()->with('warning', 'Registro não localizado!');
        }

        $usermedicamento->update($request->all());
        return redirect()
                ->route('usersmedicamentos.index')
                ->with('success', 'Registro atualizado com sucesso!');
    }

    public function destroy(string $id){
        if (!$usermedicamento = UserMedicamento::find($id)) {
            return redirect()->route('usersmedicamentos.index')->with('warning', 'Registro não localizado!');
        }else{
            $usermedicamento->delete();
        }

        return redirect()->route('usersmedicamentos.index')->with('success', 'Registro APAGADO!');
    }
}
