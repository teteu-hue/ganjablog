<x-app-layout>

    <div class="flex flex-col m-8 justify-center">
        
        <a class="text-5xl font-bold text-green-300 hover:text-green-700 w-32" href="{{ route('users.create')}}">Novo</a>
        
        <x-alert></x-alert>
        
        <table class="table-auto mt-4">
            <caption class="caption-bottom">
                Tabela de profissionais cadastrados na plataforma
            </caption>
            <thead>
                <tr>
                    <th class="border border-slate-600">Nome</th>
                    <th class="border border-slate-600">Email</th>
                    <th class="border border-slate-600">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td class="border border-slate-700 text-center">{{ $user->name }}</td>
                    <td class="border border-slate-700 text-center">{{ $user->email }}</td>
                    <td class="border border-slate-700 hover:cursor-pointer">
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">
                                Deletar
                            </button>
                        </form>
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                        <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="100">NENHUM USUÁRIO ENCONTRADO</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</x-app-layout>