@extends('manage.layouts.app')
@section('content')
  <!-- Breadcrumb-->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb pt-4">
      <li class="breadcrumb-item">
        <a href="{{ route('manage.dashboard') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ route('customers-orders.index') }}">Customers Orders</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">{{ $order->title }}</li>
    </ol>
  </nav>
  <!-- /. Breadcrumb-->
  <div class="mt-5">
    <div class="container-fluid">
      <div class="animated fadeIn">

        <div class="row justify-content-md-center">
          <div class="col-sm-8">
            <div class="card">
              <div class="card-header">
                <strong>{{ $order->title }}</strong>
                <a href="{{ route('customers-orders.edit', $order->id) }}" class="float-right font-weight-normal text-white btn btn-primary">Edit order data<i class="fas fa-plus"></i></a>
              </div>
              <div class="card-body">
                <div class="bd-example">
                  <dl class="row">
                    <dt class="col-sm-3">order Title</dt>
                    <dd class="col-sm-9">{{ $order->title }}</dd>
                    <dt class="col-sm-3">order Description</dt>
                    <dd class="col-sm-9">{{ $order->description }}</dd>
                    <dt class="col-sm-3">order Owner</dt>
                    <dd class="col-sm-9">{{ $order->user->name }}</dd>
                    <dt class="col-sm-3">order Status</dt>
                    <dd class="col-sm-9">
                      @if(!$order->customer_accepted)
                        <span class="text-white badge badge-danger">
                          Rejcted From Customer In Production State
                        </span>
                      @else
                        <span class="text-white badge badge-secondary">
                          {{ \App\Enums\OrderStatus::getDescription($order->status) }}
                        </span>
                      @endif
                    </dd>
                    <dt class="col-sm-3 text-truncate">Created At</dt>
                    <dd class="col-sm-9">{{ $order->created_at }}</dd>
                    <dt class="col-sm-3">Nesting</dt>
                    <dd class="col-sm-9">
                      <dl class="row">
                        <dt class="col-sm-4">Nested definition list</dt>
                        <dd class="col-sm-8">Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.</dd>
                      </dl>
                    </dd>
                  </dl>
                </div>
              </div>
              {{-- /. Card Body --}}
            </div>
            {{-- /. Card --}}
          </div>
          {{-- /. Col 12 --}}
        </div>
      </div>
      {{-- /. Row --}}
    </div>
  </div>
@endsection