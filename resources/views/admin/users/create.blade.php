<h1>Novo usuário</h1>
    {{--@include('admin.includes.errors')--}}
<form action=" {{ route('users.store') }}" method="post">
    @csrf
    @include('admin.users.partials.form')
</form>
