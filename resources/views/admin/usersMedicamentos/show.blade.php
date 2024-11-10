<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administração do Medicamento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-alert />

                    <form action="{{ Route('usersmedicamentos.destroy', $usermedicamento->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="row">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <label style="padding:0 10px 0 10px">Usuario/Paciente:</label><span>{{ $usermedicamento->nome_usuario }}</span>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <label style="padding:0 10px 0 10px">Medicamento:</label><span>{{ $usermedicamento->nome_med }}</span>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <label style="padding:0 10px 0 10px">Dosagem:</label><span>{{ $usermedicamento->qtd_dosagem }} {{ $usermedicamento->tipo_dosagem }}</span>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <label style="padding:0 10px 0 10px">Horário:</label><span>{{ $usermedicamento->qtd_dosagem }}</span>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <label style="padding:0 10px 0 10px">Data de Inicio:</label><span>{{ $usermedicamento->data_inicial }}</span>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <label style="padding:0 10px 0 10px">Término:</label><span>{{ $usermedicamento->data_final }}</span>
                            </div>

                        </div>


                        <div class="row col-2">
                            <button class="btn btn-danger" type="submit">Deletar</button>
                            <a href="{{ url()->previous() }}" class="btn btn-warning" type="button">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
