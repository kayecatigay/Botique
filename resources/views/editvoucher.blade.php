@extends('dashboard')
@section('content')
    <form action ="updatevoucher" method="get" enctype="multipart/form-data">
        
            <input type="hidden" class="form-control" id="vchid" name="vchid"  placeholder="Enter Id" value={{$voucher[0]->id}} >  <br> 
            
            
            <label for="exampleInputEmail1">Voucher Code: </label>
            <input type="number"  class="form-control" id="vcode" name="vcode"  placeholder="Enter Voucher Code" value={{$voucher[0]->Vcode}} ><br>
            
            <label for="exampleInputEmail1">Voucher Name: </label>
            <input type="text"  class="form-control" id="vname" name="vname"  placeholder="Enter Voucher Name" value={{$voucher[0]->Vname}} ><br>
            
            <label for="exampleInputEmail1">Voucher Percentage: </label>
            <input type="text"  class="form-control" id="vperc" name="vperc"  placeholder="Enter Voucher Percentage" value={{$voucher[0]->Vpercentage}} ><br>
        

            
        <br> <input type="submit" class="btn btn-primary" value="Submit" name="submit">
    </form>

@endsection