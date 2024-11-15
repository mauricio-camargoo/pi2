<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de usuários') }}  <a href="{{ route('users.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
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
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Regra</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td style="align-content: center;">
                                        @if($user->permission === "usr")
                                            <a class="btn btn-success"><i class="fas fa-user" style="color: rgb(235, 172, 77);font-size: larger"></i></a>
                                        @elseif($user->permission === "adm")
                                            <a class="btn" style="background: #000;"><i class="fas fa-user-tie" style="color: red;font-size: larger;"></i></a>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                    </div>
                    <div class="row" style="margin: 15px 0 0 0;">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
