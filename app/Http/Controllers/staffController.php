<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\staff;
use App\User;
use App\project;
use Auth;


class staffController extends Controller
{
	
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$staff = staff::find(1);
    	$users = User::all();
    	$projects = project::with('User')->get()->random(2);
        return view('staff', compact('staff', 'projects'));
    }
    
    public function saveImage(Request $request, $id)
    
    {


        $staff = staff::findOrFail($id);
        $this->validate($request, array(
        'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ));

        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = date("Y-m-d"). '-' .$file->getClientOriginalName();
            $staff->image = $imageName; 
            $file->move(public_path('/uploads/images'), $imageName );
            $request['image'] = $imageName;
            $staff->save();
        }
        return redirect()->route('staff.dashboard');
    } 

    public function destroy($id)
    {
         $intern = User::findOrFail($id);
         $intern->delete();

         return redirect()->route('staff.index');
    }  

}
