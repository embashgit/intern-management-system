@extends('layouts.app')

@section ('title'| 'Create new TASK')
@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Create new Task</h1>
		<hr>
		<form class="form-horizontal" role="form" method="POST" action="{{ route('projects.store') }}" >
			  {{ csrf_field() }}
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="name">Task:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="name" value="{{ old('name') }}">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="description">Description:</label>
		    <div class="col-sm-10"> 
		      <textarea type="text" class="form-control" name="description" value="{{ old('description') }}" ></textarea>
		    </div>
		    </div>
		   
		  <div class="form-group">
		  	<div class="col-md-2">
		  	<label class="control-label col-sm-2" for="user_id">Assign TAsk:</label>
		  	</div>
		  	<div class="col-md-10" >
				<select class="form-control" name="user_id">
				<option>Assign  to</option>
				@foreach($users as $user)
				  <option value="{{ $user->id }}" >{{$user->name}}</option>
				@endforeach
				</select> 
			</div>
		</div>
		<div class="form-group">
		  	<div class="col-md-2">
		  	<label class="control-label col-sm-2" for="user_id">TAsk Type:</label>
		  	</div>
		  	<div class="col-md-10" >
				<select class="form-control" name="type">
				<option>Select Task type</option>
				  <option value="Software Project" >Software Project</option>
				  <option value="Hardware Repairs" >Hardware Repairs</option>
				  <option value="Administrative Task" >Administrative Task</option>
				  <option value="tutorials" >Self Development</option>
				</select> 
			</div>
		</div>
		<div class="form-group">
		  	<div class="col-md-2">
		  	<label class="control-label col-sm-2" for="status">Project:</label>
		  	</div>
		  	<div class="col-md-10" >
				<select class="form-control" name="status">
				<option value="Pending">Pending</option>
				<option value="In Progress">In Progress</option>
				<option value="Accomplished">Accomplished</option>
				</select> 
			</div>
		</div>
		   <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <input type="hidden" name="_token" value="{{ Session::token() }}"/>
		      <button type="submit" class="btn btn-success btn-lg btn-block">Create project</button>
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