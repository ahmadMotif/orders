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

<div class="row my-5">
    <div class="col-12">
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th scope="col">Actions</th>
                    <th scope="col">old values</th>
                    <th scope="col">new values</th>
                </tr>
            </thead>
            <tbody>
                @if($order)
                    @forelse ($audits as $audit)
                    <tr>
                        <th>{{ $audit->getMetadata(true, JSON_PRETTY_PRINT) }}</th>
                        <th>{{ json_encode($audit->old_values, true) }}</th>
                        <th>{{ json_encode($audit->new_values, true) }}</th> 
                    </tr> 
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
