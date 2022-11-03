<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Panel\User\CreateUserRequest;
use App\Http\Requests\Panel\User\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('panel.users.index', compact('users'));
    }

    public function create()
    {
        return view('panel.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make('password');

        User::create($data);

        $request->session()->flash('status', 'کاربر به درستی ایجاد شد!');

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('panel.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update(
            $request->validated()
        );
        
        $request->session()->flash('status', 'اطلاعات کاربر به درستی ویرایش شد!');

        return redirect()->route('users.index');
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();
        $request->session()->flash('status', 'کاربر مد نظر به درستی حذف شد!');

        return back();
    }
}
