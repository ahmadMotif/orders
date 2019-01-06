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

                  @role('arbitrator')
                  <div class="row">
                    <div class="col-sm-12 form-group">
                      <label for="category">Chose Category</label>
                      <select id="category" class="form-control" name="category">
                        <option selected>Choose...</option>
                        <option value="category-one">categiry one</option>
                        <option value="category-tow">categiry tow</option>
                        <option value="category-three">categiry three</option>
                        <option value="category-foure">categiry four</option>
                      </select>
                    </div>
                  </div>
                  <!-- /.row Category For Arbitrator-->
                  <div class="row">
                    <div class="col-sm-6 form-group">
                      <label for="aritrator_decision">Upload Arbitrtor decision document</label>
                      <input type="file" name="aritrator_decision" class="form-control-file" id="aritrator_decision">
                    </div>
                    <!-- /.row Finished date For Arbitrator-->
                   
                    <div class="col-sm-6 form-group">
                      <label for="finished_at">finished date</label>
                      <input class="form-control" name="finished_at" id="finished_at" type="text" placeholder="The finished_at">
                    </div>
                    <!-- /.row Finished date For Arbitrator-->
                  </div>
                  @endrole
                  {{-- ARBIRTATOR --}}

                  <div class="row">
                    <div class="col-6">
                      <a href="{{ Storage::url($order->files) }}" target="_blank" class="btn btn-primary">View Order Files</a>
                    </div>
                    @role( [ 'language_checker', 'finance', 'print' ] )
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="files">Upload revised copy</label>
                        <input type="file" name="files" class="form-control-file" id="files">
                      </div>
                    </div>
                    @endrole
                    @role('technical_producer')
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="production_copy">Upload Finshed copy</label>
                        <input type="file" name="production_copy" class="form-control-file" id="production_copy">
                      </div>
                    </div>
                    {{-- Finshed Copy --}}
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="order_cover">Upload Book Cover</label>
                        <input type="file" name="order_cover" class="form-control-file" id="order_cover">
                      </div>
                    </div>
                    {{-- Book Cover --}}
                    @endrole
                  </div>
                  <!-- /.row Files -->

                  @role('language_checker')
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="language_cheker_report">Add Your report</label>
                          <textarea class="form-control" id="language_cheker_report" rows="3" name="language_cheker_report"></textarea>
                        </div>
                      </div>
                    </div>
                    {{-- Language Checker Report --}}
                  @endrole
                  {{-- LANGUAGE CHECKER --}}

                  @role('technical_producer')
                    <div class="row">
                      <div class="col-sm-12 form-group">
                        <label for="order_en_title">The Book Title In English</label>
                        <input class="form-control" name="order_en_title" id="order_en_title" type="text" placeholder="The order english title">
                      </div>
                    </div>
                    <!-- /.row The Book Title In English For Technical Proucer-->

                    <div class="row">
                      <div class="col-sm-12 form-group">
                        <label for="author_en_name">Author Name In English</label>
                        <input class="form-control" name="author_en_name" id="author_en_name" type="text" placeholder="The author enlish name">
                      </div>
                    </div>
                    <!-- /.row Author Name In English For Technical Proucer-->

                    <div class="row">
                      <div class="col-sm-12 form-group">
                        <label for="order_words_count">Words Count</label>
                        <input class="form-control" name="order_words_count" id="order_words_count" type="text" placeholder="Order words Count">
                      </div>
                    </div>
                    <!-- /.row drder Wors Count For Technical Proucer-->

                    <div class="row">
                      <div class="col-sm-12 form-group">
                        <label for="order_pages_count">Pages Count</label>
                        <input class="form-control" name="order_pages_count" id="order_pages_count" type="text" placeholder="Order words Count">
                      </div>
                    </div>
                    <!-- /.row Order Pages Count For Technical Proucer-->

                    <div class="row">
                      <div class="col-sm-12 form-group">
                        <label for="order_isbn">ISBN</label>
                        <input class="form-control" name="order_isbn" id="order_isbn" type="text" placeholder="Order words Count">
                      </div>
                    </div>
                    <!-- /.row drder ISBN For Technical Proucer-->
                    <div class="row">
                      <div class="col-sm-12 form-group">
                       <a href="http://orders.test/manage/contract" class="btn btn-success">Generate Contract Pdf File</a>
                      </div>
                    </div>
                    <!-- /.row Generate Contract Pdf File Technical Proucer-->

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="order_producer_contract"></label>Upload Order Producer Contract</label>
                          <input type="file" name="order_producer_contract" class="form-control-file" id="order_producer_contract">
                        </div>
                      </div>
                    </div>
                    {{-- Conract File --}}
                  @endrole
                  {{-- Technical Producer --}}

                  @role( [ 'administrator', 'arbitrator' ] )
                  <div class="form-group mt-2">
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

                  <div class="row">
                    <div class="col-sm-12 form-group">
                      <label for="finished_at">finished date</label>
                      <input class="form-control" name="finished_at" id="finished_at" type="text" placeholder="The finished_at">
                    </div>
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