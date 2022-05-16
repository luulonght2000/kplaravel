<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use App\Mail\VerifyEmail;

class RegisterController extends Controller
{

    public function getRegister()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ],
            [
                'name.required' => 'Họ và tên không được để trống!',
                'name.max' => 'Họ và tên không quá 255 ký tự!',
                'email.required' => 'Email không được để trống!',
                'email.email' => 'Email không đúng định dạng!',
                'email.max' => 'Email không quá 255 ký tự!',
                'email.unique' => 'Email đã tồn tại!',
                'password.required' => 'Mật khẩu là trường bắt buộc!',
                'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự!',
                'password.confirmed' => 'Xác nhận mật khẩu không đúng!',
            ]
        );
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'is_admin' => '0',
            'password' => Hash::make($data['password']),
        ]);
    }

    public function send($email)
    {
        $data = new \stdClass();
        $data->var_one = 'Demo One Value';
        $data->var_two = 'Demo Two Value';
        Mail::to($email)->send(new VerifyEmail($data));
    }


    public function postRegister(Request $request)
    {
        $allRequest  = $request->all();
        $validator = $this->validator($allRequest);

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        } else {
            if ($this->create($allRequest)) {
                Session::flash('success', 'Đăng ký thành viên thành công!');
                $email = $request->email;
                $this->send($email);
                // Mail::send('mails.verify', array('name' => $request->name), function ($message) use ($email) {
                //     $message->from('hello22@example.com', 'Laravel');
                //     $message->to($email)->subject('Your Reminder!');
                // });
                return redirect('register');
            } else {
                Session::flash('error', 'Đăng ký thành viên thất bại!');
                return redirect('register');
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
