@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/common.css'); }}>
    <div class="centered">
        <div class="container-fluid">
            <p class="text-center text-info display-3">Student Registration System<br><span class="text-muted display-5">is Starting Now!</span></p>
            <div class="container-fluid d-flex flex-row justify-content-center mt-4 w-50"><a class="btn btn-success" href="{{ route('student_list') }}" title="See Students List" id="show-btn">See Students List<i class="fas fa-chevron-right ml-2"></i></a></div>
        </div>
    </div>
@endsection


