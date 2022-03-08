<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered; //インベント用
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller{
    
    public function create(){
        return view('regist.register');
    }

    public function store(Request $request){
        $request -> validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

    $user = User::create([
        'name' => $request -> name,
        'email' => $request -> email,
        'password' => Hash::make($request -> password),
    ]);

    //イベント(登録完了メールを送る)
    event(new Registered($user));


    return view('regist.complete',compact('user'));
    }

}
