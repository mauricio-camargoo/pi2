<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Medicamento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-alert />

                    <form action="{{ Route('medicamentos.update', $medicamento->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <input name="medicamento" type="text" value="{{ $medicamento->medicamento }}" class="form-control" placeholder="Medicamento">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <input name="laboratorio" type="text" value="{{ $medicamento->laboratorio }}" class="form-control" placeholder="Laboratorio">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <input name="miligramas" type="text" value="{{ $medicamento->miligramas }}" class="form-control" placeholder="Miligramas">
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
