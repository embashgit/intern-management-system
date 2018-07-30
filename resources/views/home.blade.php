@extends('layouts.app')
@section('title', 'Intern Profile')
@section('content')
    
    <div class="row">
    <div class="col-12">
        <div class="col-md-4" style="border-right: 2px solid black">

            <div>
                
                <img <?php if (Auth::user()->image): ?>
                src="/uploads/images/{{Auth::user()->image }}" 
                    <?php else: ?>
                        src="{{ asset('images/imageholder.png') }}"
                <?php endif ?>  width="170px" height="170px" alt="Placeholder image" class="img-circle"/>
            </div>
            <div><h3 id="centername">{{ strtoupper(Auth::user()->name) }}</h3>
                <h3 id="centername">{{strtoupper(Auth::user()->email) }}</h3></div>
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
        <div class="col-md-8">
            <nav><h3>{{strtoupper(Auth::user()->institute)}}</h3></nav>
            <hr>
            <div><h4>Level:<span>{{strtoupper(Auth::user()->level)}}</span></h4></div>
            <hr>
            <div><h4>Supervisor Name:<span>{{strtoupper(Auth::user()->staff->name)}}</span></h4></div>
            <hr>
            <div><h4>Enrolled Date:<span>{{strtoupper(Auth::user()->created_at)}}</span></h4></div>
            <hr>
            <?php
            $date = Auth::user()->created_at;
            $newdate = strtotime ( '+6 months' , strtotime ( $date ) );
            $completion = date ( 'M,j,Y' , $newdate );
            ?>
            <div><h4>Completion Date:<span>{{ $completion}}</span></h4></div>

        </div><!--close-8-->
        
    </div>
</div>
    <hr>
    <div class="row">           
        <div class="col-12">
            <div class="col-md-7">
            <h3><strong>Project</strong></h3>
            <table class="table  table-hover table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>S/N</th>
                                    <th>Task Name</th>
                                    <th>Task Start at</th>
                                    <th>Task Description</th>
                                    <th>Status</th>
                                    
                    
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach(Auth::user()->projects as $project)
                              
                                

                                
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $project->name }}</td>

                                        <td>{{ date('M,j,Y', strtotime($project->created_at)) }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>
                                            {!! Form::open(['route' => ['projects.update', $project->id], 'method' => 'PUT' ]) !!}

                                            {!! Form::text('status', $project->status, ['class' => 'form-control pull-left', 'style'=>'width: 70px' ]) !!}

                                            {!! Form::submit($submit='ok', ['class'=>'btn btn-success btn-sm  ', 'id' =>'success', 'style'=>'float: left' ])!!}
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
    <div class="row">
        <div class="col-12">
            <h3><strong>OTHER SIWES STUDENT</strong></h3>
            <table class="table  table-hover table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Institute</th>
                                    <th>Enrolled At</th>
                                    <th>Complete On</th>
                                    <th>Supervised By</th>
                                    <th>Email</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach($users as $user)
                              
                                

                                
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->institute }}</td>
                                        <td>{{ date('M,j,Y', strtotime($user->created_at)) }}</td>
                                        <?php
                                        
                                        $date = $user->created_at;
                                        $newdate = strtotime ( '+6 months' , strtotime ( $date ) );
                                        $duedate = date ( 'M,j,Y' , $newdate );

                                            ?>
                                            <td>{{ $duedate }}</td>
                                        <td>{{ $user->staff->name }}</td>
                                        
                                        <td  class="column" >{{ $user->email }}</td>
                                    </tr>
                                @endforeach 
                            
                            </tbody>
                        </table>
        </div>
    </div><!--row-->
    <div class="row">
        <div class="col-12">
            <h3><strong>Other Staff</strong></h3>
            <table class="table  table-hover table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Date Hired</th>
                                    <th>Post</th>
                                    <th>Email</th>
                                    
                        
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach($stafff as $staff)
                              
                                
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $staff->name }}</td>
                                        <td>{{ date('M,j,Y', strtotime($staff->created_at)) }}</td>
                                        <td>{{ $staff->post }}</td>
                                        
                                        <td>{{$staff->email}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div><!--close-8-->
</div>
    @endsection