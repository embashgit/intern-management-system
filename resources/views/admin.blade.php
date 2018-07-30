@extends('layouts.app')

@section('content')
	
	<div class="row">
	<div class="col-12">
		<div class="col-md-4">

			<div>
				
				<img src="/images/imageholder.png"
				  width="170px" height="170px" alt="Placeholder image" class="img-circle"/>
			</div>
			<div><h3 id="centername">{{ $hr->name }}</h3></div>
			<form method="PUT" enctype="multipart/form-data" action="{{ route('admin.update', ['id' =>$hr->id]) }}">
				{{ csrf_field() }}
				<input type="file" id="image" name="image" >
				<br>
				<input type="submit" value="Change Image" class="btn btn-primary">
			</form>
		</div>
		<div class="col-md-6">
		</div><!--close-6-->
		<div class="col-md-2">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" class="createbutton"><button  type = "button" class="btn btn-lg btn-block btn-info">Create Items  <span class="caret"></span></button></a>
		<ul class="dropdown-menu">
			
			<li>
				<a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"> Intern</a>
			</li>
			
			<li class="divider"></li>
			<li>
				<a href="{{ route('create.staff') }}"><span class="glyphicon glyphicon-user "> Staff</span></a>
			</li>
			
			
		</ul><!-- end dropdown-menu -->
		</div><!--close-3-->
	</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-12">
			<div class="col-md-8">
			<h3><strong>SIWES STUDENT</strong></h3>
			<table class="table  table-hover table-responsive">
							<thead class="thead-inverse">
								<tr>
									<th>S/N</th>
									<th>Name</th>
									<th>Enrolled At</th>
									<th>Complete On</th>
									<th>Supervised By</th>
									
									<th  class="column"  id="Option">Action</th>
								</tr>
							</thead>
							<tbody>
							
								@foreach($users as $user)
							  
								

								
									<tr>
										<th scope="row">{{ $loop->iteration }}</th>
										<td>{{ $user->name }}</td>
										<td>{{ date('M,j,Y', strtotime($user->created_at)) }}</td>
										<?php
										
										$date = $user->created_at;
										$newdate = strtotime ( '+6 months' , strtotime ( $date ) );
										$duedate = date ( 'M,j,Y' , $newdate );

										    ?>
										    <td>{{ $duedate }}</td>
										<td>{{ $user->staff->name }}</td>
										
										<td  class="column" ><button type="button" class="btn btn-primary active btn-danger btn-sm"><span class="">Delete</span></button>
										<button type="button" class="btn btn-primary active btn-info btn-sm"><span class="glyphicon glyphicon-eit"></span>Edit</button>
										<button type="button" class="btn btn-primary active btn-success btn-sm"><span class="glyphicon glyphicon-">view</span></button>
										</td>
									</tr>
								@endforeach	
							
							</tbody>
						</table>
			</div><!--close-8-->

			<div class="col-md-3"  id="events">
			<h3><strong>Events</strong></h3>
			<div class="list-group">
				@foreach($projects as $project)
				@if(is_null($project))

				<h1>no Project to Display</h1>

				@elseif($loop->iteration<=4)
					<a href="{{ route('projects.show', ['id' =>$project->id]) }}" class="list-group-item">
						<h4 class="list-group-item-heading"><strong>{{ $project->name }}</strong></h4>
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
	<div class="row">
		<div class="col-12">
			<h3><strong>Supervisors</strong></h3>
			<table class="table  table-hover table-responsive">
							<thead class="thead-inverse">
								<tr>
									<th>S/N</th>
									<th>Name</th>
									<th>Date Hired</th>
									<th>Post</th>
									
									<th  class="column"  id="Option">Action</th>
								</tr>
							</thead>
							<tbody>
							
								@foreach($stafff as $staff)
							  
								
									<tr>
										<th scope="row">{{ $loop->iteration }}</th>
										<td>{{ $staff->name }}</td>
										<td>{{ date('M,j,Y', strtotime($staff->created_at)) }}</td>
										<td>{{ $staff->post }}</td>
										
										<td  class="column" ><button type="button" class="btn btn-primary active btn-danger btn-sm"><span class="">Delete</span></button>
										<button type="button" class="btn btn-primary active btn-info btn-sm"><span class="glyphicon glyphicon-eit"></span>Edit</button>
										<button type="button" class="btn btn-primary active btn-success btn-sm"><span class="glyphicon glyphicon-">view</span></button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
			</div><!--close-8-->
</div>
@endsection



