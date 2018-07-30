@extends('layouts.app')
@section('title', 'Staff Profile')
@section('content')
	
	<div class="row">
	<div class="col-12">
		<div class="col-md-4">

			<div>
				
				<img <?php if (Auth::user()->image): ?>
				src="/uploads/images/{{Auth::user()->image }}" 
					<?php else: ?>
						src="{{ asset('images/imageholder.png') }}"
				<?php endif ?>  width="170px" height="170px" alt="Placeholder image" class="img-circle"/>
			</div>
			<div><h3 id="centername">{{ strtoupper(Auth::user()->name) }}</h3>
				<h3 id="centername">{{strtoupper(Auth::user()->post) }}</h3></div>
				<form method="PUT" enctype="multipart/form-data" action="{{ route('staff.update.image', [Auth::user()->image]) }}">
				{{ csrf_field() }}
			

				{!! Form::file('image', null, ['style'=>'margin-bottom:10px, padding:6px']) !!}
 				<br>
				<input type="submit" value="Change Image" class="btn btn-primary">
			@if($errors->any())
			  <ul class="alert alert-danger">
			  	@foreach($errors->all() as $error)
			  	<li>{{ $error }}</li>
			  	@endforeach
			  </ul>
			  @endif
		</form>
		</div>
		<div class="col-md-6">
		</div><!--close-6-->
		<div class="col-md-2">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" class="createbutton"><button  type = "button" class="btn btn-lg btn-block btn-info">Create Items  <span class="caret"></span></button></a>
		<ul class="dropdown-menu">
			
			<li>
				<a href="{{ route('projects.create') }}"><span class="glyphicon glyphicon-user"> Project</a>
			</li>
			
			
		</ul><!-- end dropdown-menu -->
		</div><!--close-3-->
	</div>
	</div>
	<hr>
	<div class="row">			
		<div class="col-12">
			<div class="col-md-7">
			<h3><strong>Interns</strong></h3>
			<table class="table  table-hover table-responsive">
							<thead class="thead-inverse">
								<tr>
									<th>S/N</th>
									<th>Name</th>
									<th>Enrolled At</th>
									
									<th  class="column"  id="Option">Action</th>
								</tr>
							</thead>
							<tbody>
							
								@foreach(Auth::user()->users as $user)
							  
								

								
									<tr>
										<th scope="row">{{ $loop->iteration }}</th>
										<td>{{ $user->name }}</td>

										<td>{{ date('M,j,Y', strtotime($user->created_at)) }}</td>
										<td><a href="{{ route('staff.destroy', ['id' =>$user->id]) }}"><button type="button" class="btn btn-primary active btn-danger"><span class="">Delete</span></button></a>
										<a href="{{ route('staff.show', ['id' =>$user->id]) }}"><button type="button" class="btn btn-primary active btn-info"><span class="glyphicon glyphicon-edit">View</span></button></a>
										</td>
									</tr>
								@endforeach	
							
							</tbody>
						</table>
			</div><!--close-8-->
			<div class="col-md-3"  id="events">
			<h3><strong>Tasks</strong></h3>
			<div class="list-group">
				@foreach($projects as $project)
				@if(is_null($project))

				<h1>no Project to Display</h1>

				@elseif($loop->iteration<=4)
					<a href="{{ route('projects.show', ['id' =>$project->id]) }}" class="list-group-item">
						<h4 class="list-group-item-heading"><strong>{{strtoupper($project->name) }}</strong></h4>
						<i>{{$project->type}}</i>
						<hr>
						<p class="list-group-item-text">{{ substr($project->description, 0, 80 ) }}{{ strlen($project->description)>80 ? '...': '.' }}</p>
						<p  class="author">-<strong>{{ $project->user->name }}</strong></p>
					</a>
				@endif
				@endforeach
				<a href="{{ url('/projects') }}"><button  type="button" class="btn btn-block btn-success">View all Projects</button></a>
			</div><!-- list-group -->
			</div><!--close-4-->
		</div>
	</div>
	@endsection