<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\User;
use App\Institute;
use App\Hostel;

class SuperAdminController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function registerAdmin(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        return redirect('/master');
    }


     public function home()
    {
        $institutes = Auth::user()->institutes;
        $user = AUth::user();
        $hostels=[];
        if(count($institutes)>0)
            $hostels = Hostel::where('institute_id',$institutes[0]->id)->join('users','users.id','=','Hostels.user_id')->get();
        return view('master.home',['user'=>$user,'institutes'=>$institutes,'hostels'=>$hostels]);
    }

    public function addHostel(){
        $institutes = Institute::all();
        $admins = User::where('role','1')->get();
        return view('master.hostels.add',['institutes'=>$institutes,'admins'=>$admins]);

    }

    public function addHostelDetails(Request $request){
        Hostel::create($request->all());
        return redirect('/master');

    }

    public function addAdmin(){
        return view('master.addadmin');
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
