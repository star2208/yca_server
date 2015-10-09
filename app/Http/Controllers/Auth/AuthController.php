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
        if (Auth::check())
        {
            return response() -> view("home");
        }
        $SuperAdmin = User::where('email', '=', '3063440744@qq.com');
        if ($SuperAdmin->count() == 0) {
                $arr = array('super_admin' => 0, 'admin' => 0, 'manager' => 0);
                //create($arr);
                $user = new User;
                $user->realName = '少年中国评论超级管理员';  //iconv("gb2312","utf-8//IGNORE",'�����й����۳�������Ա') ;
                $user->nickName = '邵中平' ;//iconv("gb2312","utf-8//IGNORE",'����ƽ') ;
                $user->email = '3063440744@qq.com';
                $user->password = bcrypt('yca1988szp51');
                $user->headImage = '/upload/icon.png';
                $user->level = json_encode($arr);
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
            return response() -> view("home");
        }
        return view("auth.login");
    }
}
