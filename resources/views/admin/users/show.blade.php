<x-app-layout>

    <h1 class="text-center text-5xl mt-6">Detalhes dos usuário</h1>
    <ul>
        <li>Nome: {{$user->name}}</li>
        <li>Email: {{$user->email}}</li>
    </ul>

</x-app-layout>