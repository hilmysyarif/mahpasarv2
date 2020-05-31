<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Hashids\Hashids;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        if(!isset($_COOKIE['ref_code'])){
            if(isset($_GET['ref_code']) && !empty($_GET['ref_code'])) {
                $ref = trim(secure($_GET['ref_code']));
                setcookie('ref_code', $ref, time() + 2147483647);
            }else{
                setcookie('ref_code', 'generic', time() + 2147483647);
            }
        }

        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ref_parent' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string', 'max:12', 'unique:users'],
            'phone' => ['required', 'string', 'max:13'],
            'pin_trx' => ['required', 'string', 'max:6'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $wa = preg_replace('/\W|[a-zA-z]/','',$data['phone']);
        $no_wa = '62'.preg_replace('/^(62)+|^(0+)/','',$wa);
        $upline = User::where('ref_code',$data['ref_parent'])->first();

        $hashids = new Hashids('', 10); // pad to length 10
        $ref_code = $hashids->encode($no_wa); // VolejRejNm

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 2, //customer
            'password' => Hash::make($data['password']),
            'ref_parent' => !empty($upline) ? $upline->id : 1,
            'phone'    => $no_wa,
            'username' => $data['username'],
            'pin_trx'  => $data['pin_trx'],
            'ref_code' => $ref_code
        ]);

        $user->assignRole(['member', 'penjual']);
        
        return $user;
    }
}
