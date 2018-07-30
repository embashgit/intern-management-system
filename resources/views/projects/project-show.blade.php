@extends('layouts.app')
@section ('title' | 'show  project')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{ $project->topic }}</h2></div>

                <div class="panel-body">
                    <p class="text-justify">{{ $project->description }}</p>
                    <p>{{ $project->code }}</p>
                    <div class="col-sm-8">
                    <h3>App designed by :<strong>{{ $project->user->name }}</strong></h3>
                    </div>
                    <div class="col-sm-4">
                    <a href="{{ route('projects.edit', ['id' =>$project->id]) }}"><button type="button" class="btn btn-primary btn-block btn-info editbutton">Update Project</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
