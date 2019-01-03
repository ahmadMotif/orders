@extends('manage.layouts.app')
@section('content')
  <!-- Breadcrumb-->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb pt-4">
      <li class="breadcrumb-item">
        <a href="{{ route('manage.dashboard') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ route('customers-orders.index') }}">customers Orders</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        Edit order
        <a href="{{ route('customers-orders.show', $order->id) }}">({{ $order->title }})</a>
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
                  Edit Order
                  <a href="{{ route('customers-orders.show', $order->id) }}">
                    ({{ $order->title }})
                  </a>
                </strong>
              </div>
              <div class="card-body">
                <form class="form-signin" action="{{ route('customers-orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="title">title</label>
                        <input class="form-control {{ $errors->has('title') ? ' is-invalid' : ''}}" name="title" id="title" type="text" placeholder="The title" value="{{ $order->title }}">
                        @if ($errors->has('title'))
                          <small class="text-danger">{{ $errors->first('title') }}</small>
                        @endif
                      </div>
                    </div>
                  </div>
                  <!-- /.row Name-->
                  
                  <div class="row">
                    <div class="col-6">
                    <a href="{{ Storage::url($order->files) }}" target="_blank">Install Files</a>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="files">Upload New Orders Files Updating</label>
                        <input type="file" name="files" class="form-control-file" id="files">
                      </div>
                    </div>
                  </div>
                  <!-- /.row Files -->


                  @role( [ 'administrator', 'arbitrator' ] )
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="acceptable" id="acceptable" value="1" checked>
                      <label class="form-check-label" for="acceptable">
                        Accept the order
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="acceptable" id="acceptable" value="0" checked>
                      <label class="form-check-label" for="acceptable">
                        Reject the order
                      </label>
                    </div>
                  </div>
                  @endrole
                  @role( [ 'language_checker', 'technical_producer', 'finance', 'print' ] )
                  <div class="form-check" style="display: none; vidibility: hidden;">
                    <input class="form-check-input" type="radio" name="acceptable" id="acceptable" value="1" checked>
                    <label class="form-check-label" for="acceptable">
                      Accept the order
                    </label>
                  </div>
                  @endrole
                  {{-- Aceptable Checkbox --}}

                  @if(!$order->customer_accepted)
                    <span class="text-white badge badge-danger my-2">
                      Rejcted From Customer In Production State
                    </span>
                  @endif

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