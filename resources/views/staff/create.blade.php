@extends('layouts.app')

@section('title', 'Create new staff')
@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Create new Staff</h1>
		<hr>
		<form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('store.staff') }}" >
		  {{ csrf_field() }}
		  <div class="form-group">
	    <label class="control-label col-sm-2" for="name">Name:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="name" value="{{ old('name') }}">
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">email:</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" name="email" value="{{ old('email') }}" ></input>
		    </div>
		    </div>
		    <div class="form-group">
		    <label class="control-label col-sm-2" for="image">Image:</label>
		    <div class="col-sm-10"> 
		      <input type="file" class="form-control" name="image" value="{{ old('image') }}" ></input>
		    </div>
		    </div>

		    <div class="form-group">
		    <label class="control-label col-sm-2" for="post">Post:</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" name="post" value="{{ old('post') }}" ></input>
		    </div>
		    </div>
		    <div class="form-group">
		    <label class="control-label col-sm-2" for="password">Password:</label>
		    <div class="col-sm-10"> 
		      <input type="password" maxlength="8" class="form-control" name="password" value="{{ old('password') }}" ></input>
		    </div>
		    </div>
		    
		   
		   <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <input type="hidden" name="_token" value="{{ Session::token() }}"/>
		      <button type="submit" class="btn btn-success btn-lg btn-block">Create Staff</button>
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