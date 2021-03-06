@extends('client.layouts.app')

@section('content')
<!-- Breadcrumb-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb pt-4">
    <li class="breadcrumb-item">
      <a href="{{ url('/home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">My Orders</li>
  </ol>
</nav>
<!-- /. Breadcrumb-->
<div class="container pt-3">
  <div class="row mx-0">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header row mx-0">
          <div class="col">
            <i class="fa fa-align-justify"></i> My Orders
          </div>
          <div class="col ">
            <a href="{{ route('orders.create') }}" class="float-right font-weight-normal text-white btn btn-primary">Add New Order <i class="fas fa-plus"></i></a>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-responsive-sm table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>The Status</th>
                <th>Sended At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
                <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->title }}</td>
                  <td>{{ $order->description }}</td>
                  <td>
                    @if(!$order->accepted)
                    <span class="text-white badge badge-danger">
                      rejected Order
                    </span>
                    @else
                      <span class="text-white badge badge-secondary">
                        {{ \App\Enums\OrderStatus::getDescription($order->status) }}
                      </span>
                    @endif
                  </td>
                  <td>{{ $order->created_at->diffForHumans() }}</td>
                  <td>
                    <a href="{{ route('orders.show', $order->id) }}" class="text-white badge badge-success">
                      View
                    </a>
                    <a href="{{ route('orders.edit', $order->id) }}"class="text-white badge badge-primary">
                      Edit
                    </a>
                    {{-- <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form> --}}
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