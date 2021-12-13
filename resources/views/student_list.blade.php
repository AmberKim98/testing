@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/common.css'); }}>
        <div class="fluid col-lg-12 margin-tb clearfix">
            <div class="float-left w-1">
                <h2 class="text-dark">Students List</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success d-block" href="{{ route('create') }}" title="Add a new student">Add a new student&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></a>
                <form action="{{ route('filter' }}" method="GET">
                    <select name="major">

                    </select>
                </form>
            </div>
        </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-striped table-responsive-lg text-center table-dark studlist-tbl">
        <thead>
            <tr class="text-white">
                <th class="sort-link">@sortablelink('id','Student ID')</th>
                <th class="sort-link">@sortablelink('name','Name')</th>
                <th class="sort-link">@sortablelink('major','Major')</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->major }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone_number }}</td>
                <td>
                    <form action="" method="POST">
                        <div class="d-flex flex-row justify-content-center" style="position:relative; top:5px;">
                            <a href="{{ route('edit', $student->id) }}" class="medium text-light link">
                                <i class="fas fa-edit  fa-lg ml-1 text-info"></i>Edit
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="delete" style="border: none; background-color:transparent;outline:none;border:0;" class="pl-3">
                                <a href="{{ route('student_delete', ['id'=>$student->id]) }}" class="medium text-light pl-1 link" ><i class="fas fa-trash fa-lg text-danger"></i>Remove
                                </a>
                            </button>
                        </div> 
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    @if(!empty($students))
        <div class="d-flex justify-content-center mt-5">{!! $students->appends(Request::except('page'))->render() !!}</div>
    @endif

@endsection