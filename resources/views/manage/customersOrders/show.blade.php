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
                    <dt class="col-sm-3">order Files</dt>
                    <dd class="col-sm-9">
                      <a href="{{ Storage::url($order->files) }}" target="_blank">Open Files</a>
                    </dd>
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


            @foreach($order->comments as $comment)
            <div class="comments mt-3">
              
              <div class="media">
                <img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="mr-3" alt="..." width="64" height="64">

                <div class="media-body">
                  <h5 class="mt-0">{{ $comment->user()->first()->name   }}</h5>
                  <small>{{   $comment->created_at->diffForHumans() }}</small>
                  <p>{{ $comment->body }}</p>
                </div>
              </div>
            </div>
            <hr>
            @endforeach
            <!-- Comments -->

            <div class="add-comment">
              <form action="{{ route('comment.store', $order->id) }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="comment">Add Your Comment</label>
                <textarea class="form-control" id="comment" rows="3" name="body"></textarea>
              </div>
              <button class="btn btn-lg btn-primary" type="submit">Comment</button>
              </form>
            </div>
          </div>

          </div>
          {{-- /. Col 12 --}}
        </div>
      </div>
      {{-- /. Row --}}
    </div>

    <ul>
      @forelse ($audits as $audit)
      <li>{{ $audit->getMetadata(true, JSON_PRETTY_PRINT) }}</li>
      @empty
      <p></p>
      @endforelse
      {{-- @forelse ($audits as $audit)
      @if($audit->event->update)
        <li>{{ $audit->event->update }}</li>
      @endif
      @empty
      <p></p>
      @endforelse --}}
    </ul>
  </div>
@endsection