@extends('client.layouts.app')
@section('content')
  <div class="container my-5">
    <h1>this Is, <span class="text-primary">{{ Auth::user()->name }}</span> Profil</h1>
  </div>
@endsection