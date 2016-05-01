@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-3 col-md-offset-1">
            <a href="/admin" style="color: blue;">Home</a>
        </div>
        <br>
        <br>
        {{--<div class="w3-container w3-center w3-animate-opacity">--}}
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: burlywood; color: white">Add Child</div>

                    <div class="panel-body" style="background-color: white">
                        @include('common.errors')
                                <!-- New Child Form -->
                        <form action="{{ url('AddChild') }}" method="POST" class="form-horizontal">
                            {!! csrf_field() !!}

                                    <!-- Child's First Name -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">First Name</label>

                                <div class="col-sm-6">
                                    <input type="text" name="fName" id="child-first-name" class="form-control" value="{{ old('fName') }}">
                                </div>
                            </div>

                                    <!-- Child's Last Name -->
                            <div class="form-group">
                                <label for="lName" class="col-sm-3 control-label">Last Name</label>

                                <div class="col-sm-6">
                                    <input type="text" name="lName" id="child-last-name" class="form-control" value="{{ old('lName') }}">
                                </div>
                            </div>

                                    <!-- Child's DOB -->
                            <div class="form-group">
                                <label for="task" class="col-sm-3 control-label">Date of Birth</label>

                                <div class="col-md-6">
                                    <input type="date" id="datepicker" name="cDob" class="form-control" placeholder="Select the date" value="{{ old('dateOfBirth') }}">
                                    {{-- @if ($errors->has('date_of_birth')) <p class="help-block"><font color="red">{{ $errors->first('date_of_birth') }}</font></p> @endif--}}
                                </div>
                            </div>

                                    <!-- Child's Grade -->
                            <div class="form-group">
                                <label for="task" class="col-sm-3 control-label">Grade</label>

                                <div class="col-sm-6">
                                    <select class="form-control" name="cGrade" value="{{ old('grade') }}">
                                        <option value="PreKG">Pre Kindergarten</option>
                                        <option value="LKG">Lower Kindergarten</option>
                                        <option value="UKG">Upper Kindergarten</option>
                                        <option value="1">Grade-1</option>
                                        <option value="2">Grade-2</option>
                                        <option value="3">Grade-3</option>
                                        <option value="4">Grade-4</option>
                                        <option value="5">Grade-5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="task" class="col-sm-3 control-label">School</label>

                                <div class="col-sm-6">
                                    <input type="text" name="school" id="child-school" class="form-control" value="{{ old('school') }}">
                                </div>
                            </div>



                            <!-- Add Child Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Add Child
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

                                                <button type="submit" class="btn btn-info">
                                                    <i class="glyphicon glyphicon-pencil"></i> Edit
                                                </button>
                                            </form>
                                        </td>

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