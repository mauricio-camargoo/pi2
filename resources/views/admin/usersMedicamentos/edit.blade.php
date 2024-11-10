<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Registro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-alert />
                    <form action="{{ Route('usersmedicamentos.update', $usermedicamento->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <select name="id_usuario" class="form-select form-select-lg">
                                    <option value="{{ $usermedicamento->id_usuario }}">{{ $usermedicamento->nome_usuario }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <select name="id_medicamento" class="form-select form-select-lg">
                                    <option value="{{ $usermedicamento->id_medicamento }}">{{ $usermedicamento->nome_med }}</option>
                                    @foreach ($medicamentos as $medicamento)
                                        <option value="{{ $medicamento->id }}">{{ $medicamento->medicamento }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <select name="tipo_dosagem" class="form-select form-select-lg">
                                    <option value="{{ $usermedicamento->tipo_dosagem }}">{{ $usermedicamento->tipo_dosagem }}</option>
                                    <option value="gota">GOTA(S)</option>
                                    <option value="comprimido">COMPRIMIDO(S)</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <input name="qtd_dosagem" type="text" value="{{ $usermedicamento->qtd_dosagem }}" class="form-control" placeholder="Quantidade da dosagem">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <input name="horario" type="text" value="{{ $usermedicamento->horario }}" class="form-control" placeholder="Horario do remedio">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <input name="data_inicial" type="text" value="{{ $usermedicamento->data_inicial }}" class="form-control" placeholder="Data de inicio da medicação">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <input name="data_final" type="text" value="{{ $usermedicamento->data_final }}" class="form-control" placeholder="Data de final da medicação">
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                            <a class="btn btn-warning" href="{{ url()->previous() }}">Voltar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
