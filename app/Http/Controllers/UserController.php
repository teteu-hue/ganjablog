<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public static function index(): View
    {
        $users = User::where('role', '<>', 'admin')->paginate(20); //User::all();

        return view("admin.users.index", compact("users"));
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(string $id)
    {
        //$user = User::where('id', '=', $id)->first();
        //$user = User::where('id', $id)->first(); // to API firstOrFail();

        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', "Usuário não encontrado");
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(string $id, UpdateUserRequest $request): RedirectResponse
    {
        if (!$user = User::find($id)) {
            return back()->with('message', "Usuário não encontrado");
        }

        $data = $request->only('name', 'email');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário editado com sucesso!');
    }

    public function show(string $id): View
    {
        $user = User::userExists($id);

        return view('admin.users.show', compact('user'));
    }

    public function destroy(string $id): RedirectResponse
    {
        $user = User::userExists($id);

        if (Auth::user()->id === $user->id) {
            return back()->with('warning', "Não é possível deletar o próprio perfil");
        }

        if ($user->delete()) {
            return back()->with('success', "Usuário $user->name removido com sucesso!");
        }

        return redirect()->route('users.index')->with('warning', "Não encontrado");
    }
}
