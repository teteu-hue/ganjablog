<x-app-layout>

    <h1>Editar usuário {{ $user->name }}</h1>

    <form action="{{ route('users.update', $user->id) }}" method="post">
        @method('patch')
        @include('admin.users.partials.form')
    </form>

</x-app-layout>