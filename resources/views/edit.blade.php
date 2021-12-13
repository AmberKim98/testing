@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Profile</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-info" href="{{ route('index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update-student-profile', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:&nbsp;&nbsp;<span class="font-weight-bold text-info">{{ $student->name }}</span></strong>
                    <input type="text" name="name" class="form-control" placeholder="Edit name...">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Major:&nbsp;&nbsp;<span class="font-weight-bold text-info">{{ $student->major }}</span></strong>
                    <input type="text" name="major" class="form-control" placeholder="Edit major...">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:&nbsp;&nbsp;<span class="font-weight-bold text-info">{{ $student->email }}</span></strong>
                    <input type="text" name="email" class="form-control" placeholder="Edit email...">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone Number:&nbsp;&nbsp;<span class="font-weight-bold text-info">{{ $student->phone_number }}</span></strong>
                    <input type="text" name="phone_number" class="form-control" placeholder="Edit phone number...">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

    </form>
@endsection