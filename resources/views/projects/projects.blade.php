@extends('layouts.app')
@section('title'| ' all Projects')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
        <h1>List of all Projects</h1>
        </div>
        <div class="col-md-3">
        <a href="{{ route('projects.create') }}" class="btn btn-lg btn-block btn-primary createbutton">Create new Task</a>
        </div> 
    </div>
    <hr>
    
    <div class="row">
        <div class="col-12">
            <table class="table  table-hover table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>S/N</th>
                                    <th>Topic</th>
                                    <th>Project Type</th>
                                    <th>Designed By</th>
                                    <th>Created At</th>
                                    <th>Superviced by</th>
                                    <th>Project Status</th>
                                    <th  class="column"  id="Option">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                 @foreach($projects as $project)
                                    <tr>
                                        
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->user->name }}</td>
                                        <td>{{ $project->type}}</td>
                                        <td>{{ date('M,j,Y', strtotime($project->created_at)) }}</td>
                                        <td>{{ $project->user->staff->name }}</td>
                                        <td>{{  $project->status }}</td>
                                        <td  class="column" ><button type="button" class="btn btn-primary active btn-danger"><span class="glyphicon glyphicon-trash">Delete</span></button>
                                        <a href="{{ route('projects.edit', ['id' =>$project->id]) }}"><button type="button" class="btn btn-primary active btn-info"><span class="glyphicon glyphicon-edit">Edit</span></button></a>
                                        <a href="{{ route('projects.show', ['id' =>$project->id]) }}"><button type="button" class="btn btn-primary active btn-success"><span class="glyphicon glyphicon-eye-open">View</span></button></a>
                                        </td>
                                    </tr>
                                
                                @endforeach 
                            
                            </tbody>
                        </table>
                        <hr>
        </div>
    </div>
</div>
@endsection
