@extends('layouts.app')

@section('content')

    {{--<div class="col-md-2 col-md-offset-0" style="background-color: teal; color: white">
        <ul class="nav nav-pills nav-stacked">
            <li ><a class="w3-hover-blue" href="home">Home</a></li>
            <li class="dropdown" >
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Child <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a class="w3-hover-green" href="/AddChild">Register Child</a></li>
                    <li><a class="w3-hover-yellow" href="/EditChild">Edit Child</a></li>
                    <li><a class="w3-hover-blue" href="#">Submenu 1-3</a></li>
                </ul>
            </li>
            <li><a class="w3-hover-orange" href="#">Menu 2</a></li>
            <li><a class="w3-hover-yellow" href="#">Menu 3</a></li>
        </ul>
    </div>--}}

    <div class="col-md-2 col-md-offset-0" style="background-color:  #004280; color: white">

     @include('layouts.parentSidenavbar')

      </div>



     <div class="col-md-2 col-md-offset-0">
         <div class="container">
             {{--<div class="w3-container w3-center w3-animate-opacity">--}}
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: burlywood; color: white">Add Child</div>

                        <div class="panel-body" style="background-color: white">

                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Success!</strong> {{ Session::get('message', '') }}
                                </div>
                                @endif


                                {{--@include('common.errors')--}}
                                        <!-- New Child Form -->
                                <form action="{{ url('AddChild') }}" method="POST" class="form-horizontal">
                                    {!! csrf_field() !!}

                                    @if(Session::has('fail'))
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <strong>Warning!</strong> {{ Session::get('message1', '') }}
                                        </div>
                                        @endif

                                                <!-- Child's First Name -->
                                        <div class="form-group {{ $errors->has('firstName') ? ' has-error' : '' }}">
                                            <label class="col-sm-3 control-label">First Name</label>

                                            <div class="col-sm-6">
                                                <input type="text" name="firstName" id="child-first-name" class="form-control" value="{{ old('firstName') }}">

                                                @if($errors->has('firstName'))
                                                    <span class="help-block">
                                        <strong>{{$errors->first('firstName')}}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Child's Last Name -->
                                        <div class="form-group {{ $errors->has('lastName') ? ' has-error' : '' }}">
                                            <label for="lastName" class="col-sm-3 control-label">Last Name</label>

                                            <div class="col-sm-6">
                                                <input type="text" name="lastName" id="child-last-name" class="form-control" value="{{ old('lastName') }}">

                                                @if($errors->has('lastName'))
                                                    <span class="help-block">
                                        <strong>{{$errors->first('lastName')}}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Child's DOB -->
                                        <div class="form-group {{ $errors->has('dateOfBirth') ? ' has-error' : '' }}">
                                            <label for="dateOfBirth" class="col-sm-3 control-label">Date of Birth</label>

                                            <div class="col-md-6">
                                                <input type="date" id="datepicker" name="dateOfBirth" class="form-control" placeholder="Select the date" value="{{ old('dateOfBirth') }}">

                                                @if($errors->has('dateOfBirth'))
                                                    <span class="help-block">
                                        <strong>{{$errors->first('dateOfBirth')}}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Child's Grade -->
                                        <div class="form-group">
                                            <label for="task" class="col-sm-3 control-label">Grade</label>

                                            <div class="col-sm-6">
                                                <select class="form-control" name="cGrade" value="{{ old('grade') }}">
                                                    <option value="Pre Kindergarten">Pre Kindergarten</option>
                                                    <option value="Lower Kindergarten">Lower Kindergarten</option>
                                                    <option value="Upper Kindergarten">Upper Kindergarten</option>
                                                    <option value="Grade-1">Grade-1</option>
                                                    <option value="Grade-2">Grade-2</option>
                                                    <option value="Grade-3">Grade-3</option>
                                                    <option value="Grade-4">Grade-4</option>
                                                    <option value="Grade-5">Grade-5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('schoolName') ? ' has-error' : '' }}">
                                            <label for="schoolName" class="col-sm-3 control-label">School Name</label>

                                            <div class="col-sm-6">
                                                <input type="text" name="schoolName" id="child-school" class="form-control" value="{{ old('schoolName') }}">

                                                @if($errors->has('schoolName'))
                                                    <span class="help-block">
                                        <strong>{{$errors->first('schoolName')}}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Add Child Button -->
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-6">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fa fa-plus"></i> Register Child
                                                </button>
                                            </div>
                                        </div>
                                </form>
                        </div>



                    </div>

                    @if (count($childs) > 0)
                        <div class="panel panel-default">
                            <div class="panel-heading"  style="background-color: rosybrown; color: white">
                                Children Details
                            </div>

                            <div class="panel-body">
                                <table class="table table-striped task-table">

                                    <!-- Table Headings -->
                                    <thead>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Date of Birth</th>
                                    <th>Grade</th>
                                    <th>School</th>
                                    <th>&nbsp;</th>
                                    </thead>

                                    <!-- Table Body -->
                                    <tbody>
                                    @foreach ($childs as $child)
                                        <tr>
                                            <!-- Child Name -->
                                            <td class="table-text">
                                                <div>{{ $child->fName }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $child->lName }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $child->dateOfBirth }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $child->grade }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $child->school }}</div>
                                            </td>


                                            <!-- Delete Button -->
                                            <td>
                                                <form action="{{ url('AddChild/'.$child->id) }}" method="POST">
                                                    {!! csrf_field() !!}
                                                    {!! method_field('DELETE') !!}

                                                    <input type="hidden" name="_method" value="DELETE">

                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection