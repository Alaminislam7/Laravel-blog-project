<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Session;
session_start();

class adminControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id = Session::get('id');
        if($user_id!=NULL){
            return Redirect::to('/dashboard')->send();
        }
       return view('admin.admin_login');
    }

    public function Admin_login_cheak(Request $request)
    {
        $user_email_address = $request->email;
        $user_password      = md5($request->user_password);

        $result = DB::table('tbl_user')
            ->where('email',$user_email_address)
            ->where('user_password',$user_password)
            ->first();

            

        if($result)
            {
                session::put('name',$result->name);
                session::put('id',$result->id);
                return Redirect::to('dashboard');
            }else{
                Session::put('exception','User id or Password Invalid');
                return Redirect::to('admin-panel');
            }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
