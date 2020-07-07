@extends('layouts.user')

@section('content')

    
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Insert your informations here:</h6>
      </div>

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <!-- Card Body -->
      <div class="card-body">

        @if(session()->has('message'))
             <div class="alert alert-success">
            {{ session()->get('message') }}
            </div>
        @endif

          {!! Form::open(['method'=>'POST', 'action'=>'UserController@store'])!!}
          <div class='form-group'>
              {!! Form::label('name', 'Your name:') !!}
              {!! Form::text('name', null, ['class'=>'form-control']) !!}
          </div>

          <div class='form-group'>
            {!! Form::label('mobile_number', 'Your mobile number:') !!}
            {!! Form::number('mobile_number', 'value');!!}
          </div>

          <div class='form-group'>
            {!! Form::label('promotional_code', 'Your promotional code:') !!}
            {!! Form::text('promotional_code', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {{ Form::checkbox('GDPR', 1) }} 
            <span>GDPR accept</span>
        </div>

        <div class="form-group">
            {{ Form::checkbox('terms', 1) }} 
            <span>Terms and conditions accept</span>
        </div>
        
        <div class='form-group'>
            {!! Form::submit('Insert Code', ['class'=>'btn btn-primary']) !!}
        </div>

          {!! Form::close() !!}
        
      </div>
    </div>
</div>


@endsection