<?php

namespace App\Http\Controllers;

use App\Http\Requests\RsgisterRequest;
use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use App\Mail\VerifyEmail;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    public function getRegister()
    {
        return view('auth.register');
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

    public function enqueue($email)
    {
        $details = $email;
        $emailJob = (new SendEmailJob($details));
        dispatch($emailJob)->release(20);
    }


    public function postRegister(RsgisterRequest $request)
    {

        $allRequest = $request->all();

        if ($this->create($allRequest)) {
            Session::flash('success', 'Đăng ký thành viên thành công!');
            $email = $request->email;
            $this->enqueue($email);
            return redirect('register');
        } else {
            Session::flash('error', 'Đăng ký thành viên thất bại!');
            return redirect('register');
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
