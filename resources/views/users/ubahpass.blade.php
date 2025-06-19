@extends('layouts.app')

{{-- Customize layout sections --}}

{{-- @section('subtitle', 'welcome') --}}
@section('content_header_title', 'Users')
{{-- @section('content_header_subtitle', 'Pemeriksaan Fisik') --}}

{{-- Content body: main page content --}}

@section('content_body')
<div class="card-header">
    <h3 class="card-title">
      {{-- <i class="fas fa-list"></i> --}}
      Ganti Kata Sandi
    </h3>
  </div> <br>


<div class="row">
    <div class="col-lg-12 margin-tb">
        {{-- <div class="pull-left">
            <h2>Ganti Kata Sandi</h2>
        </div> --}}
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('home') }}"> Kembali</a>
        </div>
    </div>
</div>

@if(Session::has('success_message'))
<div class="alert alert-success">
    <span class="fa fa-ok"></span>
    {!! session('success_message') !!}

    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>	
  <strong>{{ $message }}</strong>
</div>
@endif



<form method="POST" enctype="multipart/form-data" action="{{ route('getUbahPassStore', $user->id) }}" id="edit_airtanahwps_form" name="edit_airtanahwps_form" accept-charset="UTF-8" class="form-horizontal">
    {{ csrf_field() }}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input class="form-control" name="name" type="text" id="name" value="{{$user->name}}" readonly>
           
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password Lama:</strong>
            {!! Form::password('password-lama', array('placeholder' => 'Password Lama','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password Baru:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password Baru:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
   
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Ganti</button>
    </div>
</div>
</form>



@endsection