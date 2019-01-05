@extends('client.layouts.app')
@section('content')
  <div class="container">
    <div class="row mt-3">
      <div class="col-4 border-right text-center">
        @if ($user->image)
          <img src="{{ Storage::url(Auth::user()->image) }}" alt="">
          <p class="font-weight-bold mt-3">{{ $user->name }}</p>
        @else
          <img src="{{ asset('img/user.jpg') }}" alt="">
          <p class="font-weight-bold mt-3">{{ $user->name }}</p>
        @endif
        <div>
          <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary text-light">Edit Your Account</a>
        </div>
      </div>

      <div class="col-8">
        <p>{{ $user->email }}</p>
      </div>
    </div>
  </div>
@endsection