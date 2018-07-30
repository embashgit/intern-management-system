@extends('layouts.app')

@section ('title'| 'Edit project')
@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Edit Project: <strong>{{ $project->topic }}</strong></h1>
		<hr>
		<form class="form-horizontal" role="form" method="POST" action="{{ route('projects.update', $project->id) }}" >
			<input type="hidden" name="_method" value="PUT">
			  {{ csrf_field() }}
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="topic">Project:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="topic" value="{{ old('topic') }}" >
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="description">Description:</label>
		    <div class="col-sm-10"> 
		      <textarea type="text" class="form-control" name="description" value="{{ $project->description }}" ></textarea>
		    </div>
		    </div>
		    <div class="form-group">
		    <label class="control-label col-sm-2" for="code">Project Code:</label>
		    <div class="col-sm-10"> 
		      <textarea type="text" class="form-control" name="code" value="{{ old('code') }}"></textarea>
		    </div>
		  </div>
		  <div class="form-group">
		  	<div class="col-md-2">
		  	<label class="control-label col-sm-2" for="user_id">Project:</label>
		  	</div>
		  	<div class="col-md-10" >
				<select class="form-control" name="user_id">
				<option value="{{ $user->id }}" >{{$project->user->name}}</option>
				@foreach($users as $user)
				  <option value="{{ $user->id }}" >{{$user->name}}</option>
				@endforeach
				</select> 
			</div>
		</div>
		   <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <input type="hidden" name="_token" value="{{ Session::token() }}"/>
		      <button type="submit" class="btn btn-success btn-lg btn-block">Update Project</button>
		    </div>
		  </div>
		  
		  @if($errors->any())
		  <ul class="alert alert-danger">
		  	@foreach($errors->all() as $error)
		  	<li>{{ $error }}</li>
		  	@endforeach
		  </ul>
		  @endif

		</form>
	</div>
</div>
@endsection