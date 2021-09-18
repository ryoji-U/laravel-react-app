<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginFormRequest;

use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * @return view
     */
    public function showLogin()
    {
        return view('login.login_form');
    }

    /**
     * @return view
     * 
     */
    public function userDetail()
    {
        return view('userDetail');
    }

    /**
     * @return view
     * 
     */
    public function signupFrom()
    {
        return view('signup.signupFrom');
    }

    /**
     * @param App\Http\Requests\LoginFormRequest $request
     */
    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('blogs')->with('login_success', 'ログイン成功しました。');
        }

        return back()->withErrors([
            'login_error' => 'メールアドレスまたはパスワードが間違っています。',
        ]);
    }

    /**
     * ログアウトさせる
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('showLogin')->with('logout_msg', 'ログアウトしました。');
    }

    /**
     * ユーザー新規登録
     * 
     * @return view
     */
    public function exeSignup(SignupRequest $request)
    {
        $inputs = $request->all();
        
        $inputs['password'] = Hash::make($inputs['password']);

        //dd($inputs);

        //これがあることで「コミット」をするまでDBに登録しないようにできる。
        \DB::beginTransaction();
        try{
            //ユーザー情報を登録
            User::create($inputs);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            //laraverlで用意されている「500」というページを表示する。
            abort(500);
        }

        return redirect(route('blogs'));
    }
    
}
