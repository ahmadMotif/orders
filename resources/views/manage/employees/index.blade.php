@extends('manage.layouts.app')
@section('content')
  <!-- Breadcrumb-->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb pt-4">
      <li class="breadcrumb-item">
        <a href="{{ route('manage.dashboard') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">employees</li>
    </ol>
  </nav>
  <!-- /. Breadcrumb-->
  <div class="pt-3">
    <div class="row mx-0">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header row mx-0">
            <div class="col">
              <i class="fa fa-align-justify"></i> Employees
            </div>
            <div class="col ">
              <a href="{{ route('employees.create') }}" class="float-right font-weight-normal text-white btn btn-primary">Add New Employee <i class="fas fa-plus"></i></a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>begining At</th>
                  <th>Job</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($employees as $employee)
                  <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->created_at }}</td>
                    <td>
                      @foreach ($employee->roles as $job)
                        <small>{{ $job->display_name }}</small>
                      @endforeach
                    </td>
                    <td>
                      <a href="{{ route('employees.show', $employee->id) }}" class="text-white badge badge-success">
                        View
                      </a>
                      <a href="{{ route('employees.edit', $employee->id) }}"class="text-white badge badge-primary">
                        Edit
                      </a>
                      <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <nav>
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#">Prev</a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">4</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- /.row-->
  </div>
@endsection