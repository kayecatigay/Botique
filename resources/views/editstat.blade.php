@extends('dashboard')

@section('content_title') Status @endsection
@section('content_title_link') <a href="/statuslist" class="fw-normal"> Status </a> @endsection 

@section('content')
    <form action ="/updatestat" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="statid" name="statid"  placeholder="Enter Id" value={{$stats[0]->id}} >  <br> 
            
            <label for="exampleInputEmail1">Status Name: </label>
            <input type="text"  class="form-control" id="statname" name="statname"  placeholder="Enter Status Name: " value={{$stats[0]->Sname}} ><br>
        

            
        <br> <input type="submit" class="btn btn-primary" value="Submit" name="submit">
    </form>

@endsection