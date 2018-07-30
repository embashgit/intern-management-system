@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                              <label for="gender" class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                               

                                 <select id="gender" name="gender">
                                    <option placeholder="select gender"></option>
                                     <option value="male">Male</option>
                                     <option value="female">Female</option>
                                 </select>
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('institute') ? ' has-error' : '' }}">
                              <label for="age" class="col-md-4 control-label">Age</label>
                              <div class="col-md-6">
                                 <select id="age"  class="form-control" name="age" required="required">
                                @foreach (range(18, 30) as $number)
                                <option value="{{ $number }}">{{  $number }}</option>
                                @endforeach
                                     </select>
                              </div>

                          </div>



                        <div class="form-group{{ $errors->has('institute') ? ' has-error' : '' }}">

                             <label for="institute" class="col-md-4 control-label">Institute</label>
                            <div class="col-md-6">
                                

                                <input id="institute" type="text" class="form-control" name="institute" value="{{ old('institute') }}" required>

                                @if ($errors->has('institute'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institute') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">

                             <label for="level" class="col-md-4 control-label">Level</label>
                            <div class="col-md-6">
                                

                                 <input id="level" type="text" class="form-control" name="level" value="{{ old('level') }}" required>
                                @if ($errors->has('level'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                         <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">

                             <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                

                                 <input id="status" type="text" class="form-control" name="status" value="{{ old('status') }}" required>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('staff') ? ' has-error' : '' }}">
                            <label for="staff_id" class="col-md-4 control-label">Assign Staff</label>

                            <div class="col-md-6">

                              <select class="form-control" id="staff_id" name="staff_id" required="required">
                             <option value="" selected disabled>Choose an Supervisor.</option>
                             
                             @foreach(App\staff::all() as $onestaff)
                            <option value="{{ $onestaff->id }}">{{ $onestaff->name }}</option>
                            @endforeach
                            </select>
                              @if ($errors->has('staff_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('staff_id') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
