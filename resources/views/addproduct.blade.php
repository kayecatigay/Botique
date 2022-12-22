@extends('dashboard')
@section('content')

    <div class="container px-4 px-lg-5 mt-5">      
              
        {{ Form::open(array('url' => '/uploadfile','files'=>'true'))}}
            <div class="form-group">
                <label for="exampleInputEmail1">Product Name: </label>
                {{ Form::text('txtname',null,['class' => 'form-control'])}}
            </div>
            <div class="form-group"> 
                <label for="exampleInputEmail1">Category: </label>
                <select class="form-control" id="category" name="category">
                    <option value="1">Men</option>
                    <option value="2">Women</option>
                    <option value="3">Accesories</option>
                    <option value="4">Skin Care</option>
                    </select>
            </div>
            <div class="form-group"> 
                <label for="exampleInputEmail1">Price: </label>
                {{ Form::text('txtprice',null,['class' => 'form-control'])}}
            </div>
            <div class="form-group"> 
                <label for="exampleInputEmail1">Quantity: </label>
                {{ Form::text('txtqty',null,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Upload Image: </label>
                {{ Form::file('image',['class' => 'form-control'])}}
            </div> <br>
            {{ Form::submit('Save',['class' => 'btn btn-primary'])}}
        
        {{ Form::close()}}
      
        <br><br><br><br>
    </div>
@endsection