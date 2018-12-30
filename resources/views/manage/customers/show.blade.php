@extends('manage.layouts.app')
@section('content')
  <!-- Breadcrumb-->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb pt-4">
      <li class="breadcrumb-item">
        <a href="{{ route('manage.dashboard') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ route('customers.index') }}">customers</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">{{ $customer->name }}</li>
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
                <strong>{{ $customer->name }}</strong>
                <a href="{{ route('customers.edit', $customer->id) }}" class="float-right font-weight-normal text-white btn btn-primary">Edit customer data<i class="fas fa-plus"></i></a>
              </div>
              <div class="card-body">
                <div class="bd-example">
                  <dl class="row">
                    <dt class="col-sm-3">customer Name</dt>
                    <dd class="col-sm-9">{{ $customer->name }}</dd>
                    <dt class="col-sm-3">customer Email</dt>
                    <dd class="col-sm-9">{{ $customer->email }}</dd>
                    <dt class="col-sm-3">customer Job/s</dt>
                    <dd class="col-sm-9">
                      @foreach ($customer->roles as $job)
                        <span class="text-white badge badge-primary">
                          {{ $job->display_name }}
                        </span>
                        <span></span>
                      @endforeach
                    </dd>
                    <dt class="col-sm-3 text-truncate">Created At</dt>
                    <dd class="col-sm-9">{{ $customer->created_at }}</dd>
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