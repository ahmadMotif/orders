@extends('client.layouts.app')

@section('content')
<!-- Breadcrumb-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb pt-4">
    <li class="breadcrumb-item">
      <a href="{{ url('/home') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{ route('orders.index') }}">My Orders</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ $order->title }}</li>
  </ol>
</nav>
<!-- /. Breadcrumb-->

<div class="row justify-content-md-center mt-5">
  <div class="col-sm-8">
    <div class="card">
      <div class="card-header">
        <strong>Edit Order</strong>
      </div>
      <div class="card-body">
        <form class="form-group px-3" action="{{ route('orders.update', $order->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="title">title</label>
                <input class="form-control {{ $errors->has('title') ? ' is-invalid' : ''}}" name="title" id="title" type="text" placeholder="The Book Title" value="{{ $order->title }}">
                @if ($errors->has('title'))
                  <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
              </div>
            </div>
          </div>
          <!-- /.row Title-->

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="textarea-input">Description</label>
                <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="Description.." value="{{ $order->description }}"></textarea>
              </div>
            </div>
          </div>
          {{-- Row Description --}}

          @if($order->status == \App\Enums\OrderStatus::TechnicalProducer)
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="customer_accepted" id="customer_accepted" value="1" checked>
              <label class="form-check-label" for="customer_accepted">
                Accept the order
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="customer_accepted" id="customer_accepted" value="0" checked>
              <label class="form-check-label" for="customer_accepted">
                Reject the order
              </label>
            </div>
          </div>
          @endif
          <button class="btn btn-lg btn-primary" type="submit">Update</button>
        </form>
        {{-- Form Post --}}
      </div>
      {{-- /. Card Body --}}
    </div>
    {{-- /. Card --}}
  </div>
  {{-- /. Col 12 --}}
</div>
{{-- /. Row --}}
@endsection