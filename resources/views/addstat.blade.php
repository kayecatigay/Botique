@extends('dashboard')

@section('content_title') Status @endsection
@section('content_title_link') <a href="#" class="fw-normal"> Status </a> @endsection 

@section('content')

    <div class="container px-4 px-lg-5 mt-5">      
              
        {{ Form::open(array('url' => '/uploadstatus','files'=>'true'))}}
            <div class="form-group">
                <label for="exampleInputEmail1"></label>
                {{ Form::hidden('statid',null,['class' => 'form-control'])}}
            </div>
            <div class="form-group"> 
                <label for="exampleInputEmail1">Status Name: </label>
                {{ Form::text('statname',null,['class' => 'form-control'])}}
            </div>
            {{ Form::submit('Save',['class' => 'btn btn-primary'])}}
        
        {{ Form::close()}}
      
        <br><br><br><br>
    </div>
@endsection