<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Validator;
use Hash;
use Session;
use Redirect;

use App\User;
use App\Classes;
 
class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('login');
    }
 
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
 
        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
 
        Auth::attempt($data);
 
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
 
        } else { // false
 
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
 
    }
 
    public function showFormRegister()
    {
        if (Auth::check()) { 
            $classes = Classes::get();
            $compactData=array('classes');
            return View::make('users.create', compact($compactData));
        }
        return view('register');
    }
 
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
            'role'                  => 'required'
        ];
 
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
    
        $user = new User;
        $user->kode = ucwords(strtolower($request->kode));
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->role = ucwords(strtolower($request->role));
        $user->class_id = $request->class_id;
        $simpan = $user->save();
 
        if($simpan){
            if (Auth::check()) { 
                Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
                return redirect()->route('users.index');
            }
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
 
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }

    public function index()
    {
        $data['users'] = User::orderBy('id','desc')->paginate(10);
        foreach ($data['users'] as $key => $value) {

            if(!empty($value->class_id)){
                $class = Classes::where('id',$value->class_id)->get();
                //dd($class[0]->name);
                
                $data['users'][$key]['class_name'] = $class[0]->name;
            } else {
                $data['users'][$key]['class_name'] = '';
            }
        
        }
        return view('users.list',$data);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['user_info'] = User::where($where)->first();

        $classes = Classes::get();

        //dd($teachers);exit;

        $compactData=array('classes', 'data');
        return View::make('users.edit', compact($compactData));
        //return view('courses.edit', $data);
    }

    
    public function update(Request $request, $id)
    {
        $update = $request->except('_method','_token','submit');
        // dd($request);
        $request->validate([
            'kode' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'class_id' => 'required'
            ]);
            
        $update = ['kode' => $request->kode, 'name' => $request->name, 'email' => $request->email, 'password' => $request->password, 'role' => $request->role, 'class_id'=>$request->class_id];

        $update['kode'] = $request->get('kode');
        $update['name'] = $request->get('name');
        $update['email'] = $request->get('email');
        $update['password'] = Hash::make($request->password);
        $update['role'] = $request->get('role');
        $update['class_id'] = $request->get('class_id');
        $upate['updated_at'] = date('Y-m-d H:i:s');

        User::where('id',$id)->update($update);
        return Redirect::to('users')->with('success','Great! User updated successfully');
    }

    
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return Redirect::to('users')->with('success','User deleted successfully');
    }
 
 
}