@extends('dashboard')

@section('content_title') Sales @endsection
@section('content_title_link') <a href="/saleslist" class="fw-normal"> Sales </a> @endsection 

@section('content')
    <form action ="/updatestatus" method="get" enctype="multipart/form-data">
        
            <input type="hidden" class="form-control" id="sid" name="sid"  placeholder="Enter Id" value={{$sales[0]->id}} >  <br> 
            
            <label for="exampleInputEmail1">Status: </label>
            <input type="text"  class="form-control" id="stat" name="stat"  placeholder="Enter Status: " value={{$sales[0]->status}} ><br>
        

            
        <br> <input type="submit" class="btn btn-primary" value="Submit" name="submit">
    </form>

@endsection