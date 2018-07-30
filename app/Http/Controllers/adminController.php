<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\admin;
use App\staff;
use App\project;

class adminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stafff = staff::all();
         $users =User::all();
         $hr = admin::find(1);
        $projects = project::with('User')->get();

         return view('admin', compact('users', 'hr','projects','stafff'));
    }

    public function saveImage(Request $request, $id)
    
    {
        $admin = Admin::findOrFail($id);
        $this->validate($request, array(
        'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ));

        $image = $request->image;
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = date("Y-m-d"). '-' .$file->getClientOriginalName();
            $admin->image = $imageName; 
            $file->move(public_path('/uploads/images'), $imageName );
            $request['image'] = $imageName;
            $admin->save();
        }
    }

     public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $formInput = $request->except('image');
        $this->validate($request, array(
        'name'=>'required',
        'email'=>'required',
        'post'=>'required',
        'password'=>'required|max:8',
        'image'=>'image|mimes:png,jpg,jpeg|max:10000'
         ));
        $formInput['password'] = bcrypt(request('password'));
        $image = $request->image;

        if($image){
            $imageName = date("Y-m-d"). '-' .$image->getClientOriginalName();
            $image->move(public_path('/uploads/images'), $imageName );
            $formInput['image'] = $imageName;
        }

        Staff::create($formInput);
        return redirect()->route('admin.dashboard')->withSuccessMessage( " 
            A new Staff has been successfully Registered.");
   
    }
}
