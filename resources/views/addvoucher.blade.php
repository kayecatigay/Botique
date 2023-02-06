@extends('dashboard')
@section('content')

    <div class="container px-4 px-lg-5 mt-5">      
              
        {{ Form::open(array('url' => '/uploadvoucher','files'=>'true'))}}
            <div class="form-group">
                <label for="exampleInputEmail1">Voucher Code: </label>
                {{ Form::text('vcode',null,['class' => 'form-control'])}}
            </div>
            <div class="form-group"> 
                <label for="exampleInputEmail1">Voucher Name: </label>
                {{ Form::text('vname',null,['class' => 'form-control'])}}
            </div>
            <div class="form-group"> 
                <label for="exampleInputEmail1">Voucher Percentage: </label>
                {{ Form::text('vperc',null,['class' => 'form-control'])}}
            </div>
            {{ Form::submit('Save',['class' => 'btn btn-primary'])}}
        {{ Form::close()}}
      
        <br><br><br><br>
    </div>
@endsection