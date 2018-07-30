@extends('layouts.app')
@section('title'| '  Staff')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
        <h1>List of all staff</h1>
        </div>
        <div class="col-md-3">
        <a href="{{ route('projects.create') }}" class="btn btn-lg btn-block btn-primary createbutton">Create new staff</a>
        </div> 
    </div>
    <hr>
    
    <div class="row">
        <div class="col-12">
            <table class="table  table-hover table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>S/N</th>
                                    <th>name</th>
                                    <th>Post</th>
                                    <th>Date Employed</th>
                                    <th  class="column"  id="Option">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                 @foreach($stafff as $staff)
                                    <tr>
                                        
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $staff->name }}</td>
                                        <td>{{ $staff->post }}</td>
                                        <td>{{ $staff->user->name }}</td>
                                        <td>{{ date('M,j,Y', strtotime($staff->created_at)) }}</td>
                                        <td  class="column" ><button type="button" class="btn btn-primary active btn-danger"><span class="">Remove Staff</span></button>
                                        <a href="{{ route('staff.edit', ['id' =>$staff->id]) }}"><button type="button" class="btn btn-primary active btn-info"><span class="">Update staff</span></button></a>
                                        <a href="{{ route('staff.show', ['id' =>$staff->id]) }}"><button type="button" class="btn btn-primary active btn-success"><span class="glyphicon glyphicon-eye-open">View</span></button></a>
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
