<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|confirmed|min:6',
//        ]);
//    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function getLogin()
    {
        $SuperAdmin = User::where('email', '=', '3063440744@qq.com');
        if ($SuperAdmin->count() == 0) {
                $user = new User;
                $user->realName = 'YCAsuperadmin';
                $user->nickName = 'YCA' ;
                $user->email = '3063440744@qq.com';
                $user->password = bcrypt('yca1988szp51');
                $user->headImage = '/upload/icon.png';
                $user->level = ['super_admin' => 0, 'admin' => 0, 'manager' => 0];
                $user->save();
        }
        return view("auth.login");
    }

    public function postLogin(Request $request){

        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect()->action('HomeController@index');
        }
        return view("auth.login");
    }
}
