<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AddInfoController extends Controller
{
    public function add(Request $request)
    {
        $validateFields = $request->validate([
            'name'=> 'required',
            'login' => 'required',
            'email' => 'required|email',
            'phone' => '',
            'password' => 'required'
        ]);
        $User = Auth::user();
        $User->update($validateFields);
        return redirect(route('user.private'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении пользователя'
        ]);
        
    }
}
