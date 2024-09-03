<x-alert></x-alert>
@csrf
<label for="name">Nome</label>
<input name="name" type="text" placeholder="Digite seu nome" value="{{ $user->name ?? old('name')}}">
<label for="email">Email</label>
<input name="email" type="email" placeholder="Digite sua senha" value="{{ $user->email ?? old('email')}}"> 
<label for="password">Senha</label>
<input name="password" type="password">
<input type="submit" value="Enviar">