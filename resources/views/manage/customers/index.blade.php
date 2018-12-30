@extends('manage.layouts.app')
@section('content')
  <!-- Breadcrumb-->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb pt-4">
      <li class="breadcrumb-item">
        <a href="{{ route('manage.dashboard') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">customers</li>
    </ol>
  </nav>
  <!-- /. Breadcrumb-->
  <div class="pt-3">
    <div class="row mx-0">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header row mx-0">
            <div class="col">
              <i class="fa fa-align-justify"></i> customers
            </div>
            <div class="col ">
              <a href="{{ route('customers.create') }}" class="float-right font-weight-normal text-white btn btn-primary">Add New customer <i class="fas fa-plus"></i></a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Registerd At</th>
                  <th>Job</th>
                  <th>Orders Count</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($customers as $customer)
                  <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->created_at }}</td>
                    <td>
                      @foreach ($customer->roles as $job)
                        <small>{{ $job->display_name }}</small>
                      @endforeach
                    </td>
                    <td>
                      <span class="badge badge-pill badge-info">{{ count($customer->orders()->get()) }}</span> Order
                    </td>
                    <td>
                      <a href="{{ route('customers.show', $customer->id) }}" class="text-white badge badge-success">
                        View
                      </a>
                      <a href="{{ route('customers.edit', $customer->id) }}"class="text-white badge badge-primary">
                        Edit
                      </a>
                      <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
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