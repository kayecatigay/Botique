@extends('dashboard')

@section('content_title') Products @endsection
@section('content_title_link') <a href="#" class="fw-normal"> Products </a> @endsection 

@section('content')
    <form action ="updateproduct" method="get" enctype="multipart/form-data">
        
            <input type="hidden" class="form-control" id="txtid" name="txtid"  placeholder="Enter Product Name" value={{$prod[0]->id}} >   
            <label for="exampleInputEmail1">Product Name: </label>
            <input type="text" class="form-control" id="txtname" name="txtname"  placeholder="Enter Product Name" value={{$prod[0]->productname}} ><br>   
            
            <label for="exampleInputEmail1">Category: </label>
            <input type="number"  class="form-control" id="category" name="category"  placeholder="Enter Category" value={{$prod[0]->category}} ><br>
            
            <label for="exampleInputEmail1">Price: </label>
            <input type="number"  class="form-control" id="txtprice" name="txtprice"  placeholder="Enter Price" value={{$prod[0]->price}} ><br>
            
            <label for="exampleInputEmail1">Quantity: </label>
            <input type="number"  class="form-control" id="txtqty" name="txtqty"  placeholder="Enter Quantity" value={{$prod[0]->quantity}} ><br>
        
            <div class="form-group">
                <label for="exampleInputEmail1">Upload Image: </label>
                <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" placeholder="Upload Image">
            </div>
            
        <br> <input type="submit" class="btn btn-primary" value="Submit" name="submit">
    </form>

@endsection