<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //googleアカウントログイン画面へ移動
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //googleアカウント会員登録、ログイン処理
    public function handleGoogleCallback()
    {
        //googleアカウントユーザー情報を取得
        $googleUser = Socialite::driver('google')->stateless()->user();

        //ユーザー取得
        $user = User::firstOrNew(['email'=>$googleUser->getEmail()]);

        //すでに登録済ならログイン処理
        if ($user->exists) {
            $this->guard()->login($user, true);
            return redirect()->route('top');
        }
        
        //新規ユーザーなら会員登録
        $user->name = $googleUser->getNickname() ?? $googleUser->getName() ?? $googleUser->getNick();
        $user->email = $googleUser->email;
        $user->save();
        Auth::login($user);
        return redirect()->route('top');
    }

    //ログイン後ユーザー情報とMY日記一覧を返す
    protected function authenticated(Request $request, $user)
    {
        $diaries = $user->diaries()->orderByDesc('entry_at')->get();

        return ['user' => $user, 'diaries' => $diaries];
    }

    //ログアウト
    protected function loggedOut(Request $request)
    {
        $request->session()->regenerate();

        return response()->json();
    }
}
