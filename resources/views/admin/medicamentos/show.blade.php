<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Usuário') }} {{ $medicamento->medicamento }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-alert />

                    <form action="{{ Route('medicamentos.destroy', $medicamento->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="row">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <label style="padding:0 10px 0 10px">Medicamento:</label><span>{{ $medicamento->medicamento }}</span>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <label  style="padding:0 10px 0 10px">Laboratório:</label><span>{{ $medicamento->laboratorio }}</span>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <label  style="padding:0 10px 0 10px">Miligramas:</label><span>{{ $medicamento->miligramas }}</span>
                            </div>
                        </div>


                        <div class="row col-2">
                            <button class="btn btn-danger" type="submit">Deletar</button>
                            <a href="{{ Route('medicamentos.index') }}" class="btn btn-warning" type="button">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
