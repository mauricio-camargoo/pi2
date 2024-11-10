<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de Medicamento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 container">
                    <x-alert />

                    <form action="{{ Route('medicamentos.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <input name="medicamento" type="text" value="{{ old('medicamento') }}" class="form-control" placeholder="Medicamento">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <input name="laboratorio" type="text" value="{{ old('laboratorio') }}" class="form-control" placeholder="Laboratorio">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-medkit"></i></span>
                                <input name="miligramas" type="text" value="{{ old('miligramas') }}" class="form-control" placeholder="Miligramas">
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>