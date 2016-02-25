@extends('layout/template')
@section('content')
    <h1>About Course</h1>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Cover</label>
            <div class="col-sm-10">
                <img src="{{asset('Uploads/'.$courses->img)}}" height="180" width="150" class="img-rounded">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder={{$courses->name}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="category" placeholder={{$categoryname->name}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="descrption" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="descrption" placeholder={{$courses->description}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="date" class="col-sm-2 control-label">Upload Date</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="date" placeholder={{$courses->date}} readonly />

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('courses')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
@stop