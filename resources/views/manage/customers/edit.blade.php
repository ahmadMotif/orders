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
      <li class="breadcrumb-item active" aria-current="page">
        Edit customers Data
        <a href="{{ route('customers.show', $customer->id) }}">({{ $customer->name }})</a>
      </li>
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
                <strong>
                  Edit customers Data
                  <a href="{{ route('customers.show', $customer->id) }}">
                    ({{ $customer->name }})
                  </a>
                </strong>
              </div>
              <div class="card-body">
                <form class="form-signin" action="{{ route('customers.update', $customer->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control {{ $errors->has('name') ? ' is-invalid' : ''}}" name="name" id="name" type="text" placeholder="The name" value="{{ $customer->name }}">
                        @if ($errors->has('name'))
                          <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                      </div>
                    </div>
                  </div>
                  <!-- /.row Name-->

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="email">email</label>
                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : ''}}" name="email" id="email" type="email" placeholder="The email" value="{{ $customer->email }}">
                        @if ($errors->has('email'))
                          <small class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                      </div>
                    </div>
                  </div>
                  <!-- /.row email-->

                  <div class="form-group row">
                    <label class="col-md-4 col-form-label">
                      Chose Job/s To this customer
                    </label>
                    <div class="col-md-8 col-form-label">
                      @foreach ($customersJobs as $job)
                        <div class="form-check">
                          <input class="form-check-input" name="jobs[]" value="{{ $job->id }}" id="customer-jobs-{{ $job->id }}" type="checkbox">
                          <label class="form-check-label" for="customer-jobs-{{ $job->id }}">
                            {{ $job->display_name }}
                          </label>
                        </div>
                      @endforeach
                      @if ($errors->has('jobs'))
                        <small class="text-danger">{{ $errors->first('jobs') }}</small>
                      @endif
                    </div>
                  </div>
                  {{-- /. Check Box Job --}}
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
                </form>
                {{-- Form Post --}}
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