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
                    <div class="panel-heading" style="background-color: burlywood; color: white">To Do List</div>

                    <div class="panel-body" style="background-color: white">
                        @include('common.errors')
                                <!-- New Task Form -->
                        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                            {!! csrf_field() !!}

                                    <!-- Task Name -->
                            <div class="form-group">
                                <label for="task" class="col-sm-3 control-label">Task</label>

                                <div class="col-sm-6">
                                    <input type="text" name="name" id="task-name" class="form-control">
                                </div>
                            </div>

                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Add Task
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>



                </div>

                @if (count($tasks) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading"  style="background-color: rosybrown; color: white">
                            Current Tasks
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped task-table">

                                <!-- Table Headings -->
                                <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>


                                            <!-- Delete Button -->
                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
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
