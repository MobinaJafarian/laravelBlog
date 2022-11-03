<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Panel\User\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('panel.profile');
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->validated();

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('profile')) {
            
            $file = $request->file('profile');
            $ext = $file->getClientOriginalExtension();

            $file_name = auth()->user()->id . '_' . time() . '.' . $ext;
            $file->storeAs('images/users', $file_name, 'public_files');

            $data['profile'] = $file_name;
        }


        auth()->user()->update(
            $data
        );

        session()->flash('status', 'اطلاعات کاربری شما ویرایش شد!');

        return back();
    }
}
