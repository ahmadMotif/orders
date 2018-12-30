@extends('client.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Notifications
                </div>

                <div class="card-body">
                    @foreach (Auth::user()->unreadNotifications as $notification)
                    <h6>
                        <a href="{{ route('orders.show',$notification->data['id']) }}">
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
