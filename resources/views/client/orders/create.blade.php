@extends('client.layouts.app')

@section('content')
<div class="row justify-content-md-center mt-5">
  <div class="col-sm-8">
    <div class="card">
      <div class="card-header">
        <strong>Create New Printing Order</strong>
      </div>
      <div class="card-body">
        <form class="form-group px-3" action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="title">title</label>
                <input class="form-control {{ $errors->has('title') ? ' is-invalid' : ''}}" name="title" id="title" type="text" placeholder="The Book Title" value="{{ old('title') }}">
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
                <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="Description.." value="{{ old('description') }}"></textarea>
              </div>
            </div>
          </div>
          {{-- Row Description --}}

          <div class="row">
            <div class="form-group">
              <label for="files">Upload Order Files</label>
              <input type="file" name="files" class="form-control-file" id="files">
            </div>
          </div>
          {{-- Row Files --}}

          <button class="btn btn-lg btn-primary" type="submit">Send</button>
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