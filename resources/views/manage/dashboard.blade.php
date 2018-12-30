@extends('manage.layouts.app')
@section('content')
  <!-- Breadcrumb-->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb py-3">
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </nav>
  <!-- /. Breadcrumb-->
  <div class="row">
    <div class="col-8">
      <div class="card">
        <div class="card-header">The Content</div>
      </div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-header">The Notifications</div>
        <div class="card-body">
          @foreach (Auth::user()->unreadNotifications as $notification)
            <h6>
              <a href="{{ route('customers-orders.show',$notification->data['id']) }}">
                {{ $notification->data['subject'] }}, <strong>about</strong>
                {{ $notification->data['title'] }}
              </a>
            </h6>
            <span class="text-muted">{{ $notification->created_at->diffForHumans() }}</span>
            <hr>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection