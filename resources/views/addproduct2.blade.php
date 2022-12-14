@extends('dashboard')
@section('content')
    <div class="container px-4 px-lg-5 mt-5">            
        <form action ="insertproduct" method="get" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Name: </label>
                <input type="text" class="form-control" id="txtname" name="txtname" aria-describedby="" placeholder="Enter Product Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price: </label>
                <input type="number" class="form-control" id="txtprice" name="txtprice" aria-describedby="" placeholder="Enter Price">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Quantity: </label>
                <input type="number" class="form-control" id="txtqty" name="txtqty" aria-describedby="" placeholder="Enter Quantity">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Image: </label>
                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
            </div><br>
            <input type="submit" class="btn btn-primary" value="Save" name="submit">
        </form>
        <br><br><br>
    </div>
@endsection