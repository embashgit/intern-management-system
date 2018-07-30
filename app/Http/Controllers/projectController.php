<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\admin;
use Session;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
    {
        $this->middleware('auth:staff');
    }
    

    public function index()
    {
        $projects = Project::with('User')->get();

        return view('projects.projects',compact('projects'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $users =User::all();
        return view('projects.projectForm',compact('users'));
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
        $this->validate($request, array(
            'name'=> 'required|max:100',
            'description' =>'required',
            'status' => 'required',
            'type' =>   'required',
            'user_id'=>'required'
            ));
        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->type = $request->type;
        $project->user_id = $request->user_id;
        $project->save();

        return redirect('projects');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);

    

         return view('projects.project-show', compact('project'));

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
         $project = Project::findOrFail($id);
         $users =User::all();
         $user = User::findOrFail($id);

         return view('projects.project-edit', compact('project','users','user'));

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
         $this->validate($request, array(
            'name'=> 'required|max:100',
            'description' =>'required',
            'user_id'=>'required'
            ));
        $project = Project::findOrFail($id);

        $project->update($request->all());
        Session::flash('success', 'This post was successfully saved');
        return redirect()->route('projects.projects.show', $project->id);
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
