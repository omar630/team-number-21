<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\User;
use App\Institute;
use App\Hostel;
use App\Department;

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
        $courses=[];
        $i=0;
        if(count($institutes)>0){
            $hostels = Hostel::where('institute_id',$institutes[0]->id)->join('users','users.id','=','hostels.user_id')->get();            
        }
        foreach($institutes as $institute){
            $institute->courses = Institute::find($institute->id)->departments->pluck('short_code');
        }
        $departments = Department::all();
        return view('master.home',['user'=>$user,'institutes'=>$institutes,'hostels'=>$hostels,'courses' => $courses,'departments'=>$departments]);
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

    public function getAddCollege(Request $request){
        $user = Auth::user();
        return view('master.addcollege',['user'=>$user]);
    }

    public function postAddCollege(Request $request){
        $institute = new Institute;
        $institute->name = $request->name;
        $institute->code = $request->code;
        $institute->address = $request->address;
        $institute->type = 1;
        $institute->user_id = $request->user_id;
        $institute->save();
        return redirect('/master');
    }

    public function saveCourse(Request $request){
        return $request;
    }

public function getAddStudents(Request $request){
        $hostel_id = $request->id;
        $hostel = Hostel::find($hostel_id)->first();
        //$departments = Department::all();
        $departments = Institute::find($hostel->institute_id)->departments;
        return view('admin.addstudents',['hostel'=>$hostel,'departments'=>$departments]);
    }

    public function savestudent(Request $request){
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = (new FastExcel)->import($path, function ($line) {
                $department = Department::where('short_code',$line['department'])->first()->pluck('id');
    return Student::create([
        'roll_no' => $line['roll_no'],
        'name' => $line['name'],
        'father_name' => $line['father_name'],
        'department_id' => $department[0],
        'year' => $line['year'],
        'mobile' => $line['mobile'],
        'gender' => $line['gender']
    ]);
});
            if($data){
                return 'inserted';
            }
            else{
                return 'error';
            }
   
        }
        dd('Request data does not have any files to import.'); 
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
