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
            <div class="col-sm-12">
              <div class="form-group">
                <label for="files">Upload Order Files</label>
                <input type="file" name="files" class="form-control-file" id="files">
              </div>
            </div>
          </div>
          {{-- Row Files --}}

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="applicant_address">applicant address</label>
                <input class="form-control {{ $errors->has('applicant_address') ? ' is-invalid' : ''}}" name="applicant_address" id="applicant_address" type="text" placeholder="applicant address" value="{{ old('applicant_address') }}">
                @if ($errors->has('applicant_address'))
                  <small class="text-danger">{{ $errors->first('applicant_address') }}</small>
                @endif
              </div>
            </div>
          </div>
          <!-- /.row Address-->

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="phone_number">phone number</label>
                <input class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : ''}}" name="phone_number" id="phone_number" type="text" placeholder="phone number" value="{{ old('phone_number') }}">
                @if ($errors->has('phone_number'))
                  <small class="text-danger">{{ $errors->first('phone_number') }}</small>
                @endif
              </div>
            </div>
          </div>
          <!-- /.row phone-->

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="postal_code">postal code</label>
                <input class="form-control {{ $errors->has('postal_code') ? ' is-invalid' : ''}}" name="postal_code" id="postal_code" type="text" placeholder="The Book postal_code" value="{{ old('postal_code') }}">
                @if ($errors->has('postal_code'))
                  <small class="text-danger">{{ $errors->first('postal_code') }}</small>
                @endif
              </div>
            </div>
          </div>
          <!-- /.row postal_code-->

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="photo">Upload Peronal photo</label>
                <input type="file" name="photo" class="form-control-file" id="photo">
              </div>
            </div>
          </div>
          {{-- Row photo --}}

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="cv">upload your cv</label>
                <input type="file" name="cv" class="form-control-file" id="cv">
                @if ($errors->has('cv'))
                  <small class="text-danger">{{ $errors->first('cv') }}</small>
                @endif
              </div>
            </div>
          </div>
          <!-- /.row cv-->

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="passport_img">upload your passport img</label>
                <input type="file" name="passport_img" class="form-control-file" id="passport_img">
                @if ($errors->has('passport_img'))
                  <small class="text-danger">{{ $errors->first('passport_img') }}</small>
                @endif
              </div>
            </div>
          </div>
          <!-- /.row passport_img -->

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="delivery_way">delivery way</label>
                <input class="form-control {{ $errors->has('delivery_way') ? ' is-invalid' : ''}}" name="delivery_way" id="delivery_way" type="text" placeholder="The Book delivery_way" value="{{ old('delivery_way') }}">
                @if ($errors->has('delivery_way'))
                  <small class="text-danger">{{ $errors->first('delivery_way') }}</small>
                @endif
              </div>
            </div>
          </div>
          <!-- /.row delivery_way-->

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="band_details">band details</label>
                <input class="form-control {{ $errors->has('band_details') ? ' is-invalid' : ''}}" name="band_details" id="band_details" type="text" placeholder="The Book band_details" value="{{ old('band_details') }}">
                @if ($errors->has('band_details'))
                  <small class="text-danger">{{ $errors->first('band_details') }}</small>
                @endif
              </div>
            </div>
          </div>
          <!-- /.row band_details-->

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="is_translated" id="is_translated" value="1" checked>
                  <label class="form-check-label" for="is_translated">
                    translated Book
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="is_translated" id="is_translated" value="0" checked>
                  <label class="form-check-label" for="is_translated">
                    authored book
                  </label>
                </div>
              </div>
            </div>
          </div>
          {{--  is translatedbook --}}

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="contract_img">contract img</label>
                <input type="file" name="contract_img" class="form-control-file" id="contract_img">
                @if ($errors->has('contract_img'))
                  <small class="text-danger">{{ $errors->first('contract_img') }}</small>
                @endif
              </div>
            </div>
          </div>
          <!-- /.row contract_img-->

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="original_author">original_author</label>
                <input class="form-control {{ $errors->has('original_author') ? ' is-invalid' : ''}}" name="original_author" id="original_author" type="text" placeholder="The Book original_author" value="{{ old('original_author') }}">
                @if ($errors->has('original_author'))
                  <small class="text-danger">{{ $errors->first('original_author') }}</small>
                @endif
              </div>
            </div>
          </div>
          <!-- /.row original_author-->

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="source_language">source_language</label>
                <input class="form-control {{ $errors->has('source_language') ? ' is-invalid' : ''}}" name="source_language" id="source_language" type="text" placeholder="The Book source_language" value="{{ old('source_language') }}">
                @if ($errors->has('source_language'))
                  <small class="text-danger">{{ $errors->first('source_language') }}</small>
                @endif
              </div>
            </div>
          </div>
          <!-- /.row source_language-->

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