<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista Receitados') }} <a href="{{ route('usersmedicamentos.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
        </h2>
        <span>
            <x-alert/>
        </span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Medicamento</th>
                                <th>Dosagem</th>
                                <th>Data Inicial</th>
                                <th>Data Final</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dados as $usermed)
                                <tr>
                                    <td>{{ $usermed->id }}</td>
                                    <td>{{ $usermed->nome_usuario }}</td>
                                    <td>{{ $usermed->nome_med }}</td>
                                    <td>{{ $usermed->qtd_dosagem }} {{ $usermed->tipo_dosagem }}</td>
                                    <td>{{ $usermed->data_inicial }}</td>
                                    <td>{{ $usermed->data_final }}</td>
                                    <td>
                                        <a href="{{ route('usersmedicamentos.edit', $usermed->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('usersmedicamentos.show', $usermed->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                    </div>
                    <div class="row" style="margin: 15px 0 0 0;">
                        {{ $dados->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
