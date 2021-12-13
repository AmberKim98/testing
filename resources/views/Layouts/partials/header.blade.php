<nav class="navbar navbar-inverse navbar-fixed-top bg-dark">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-light" href="{{ route('index') }}">Student Registration System</a>
    </div>
    <ul class="navbar-nav flex-row justify-content-between">
      <li class="mr-5"><a href="{{ route('index') }}" class="nav-link text-light">Home</a></li>
      <li class="mr-5"><a href="{{ route('student_list') }}" class="nav-link text-light">Students List</a></li>
      <li><a href="{{ route('create') }}" class="nav-link text-light">Add new student</a></li>
    </ul>
  </div>
</nav>