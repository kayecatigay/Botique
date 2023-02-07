@extends('home')

@section('maincontent')

<br><br><br><br><br><br><br><br><br><br>
<div class="container">
@php($allamount="")
  @foreach ($salesinfo as $info)
    <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5 class="panel-title">
          <a data-toggle="collapse" href="#collapse{{ $info->sid }}" onclick="getOrders('{{$info->order_num }}','{{$info->sid }}','{{ $info->Sname }}')">
              <div class="row alert alert-primary">
                <div class="col"> <i class="bi bi-bag-heart"></i> Order Number: {{ $info->order_num }}</div>
                <div class="col">Shipping Fee: 75.00</div>
                <div class="col">Total Amount: {{ floatval($info-> total_num)-75 }}</div>
              </div>
            </a>
        </h5>
      </div>
      <div id="collapse{{ $info->sid }}" class="panel-collapse collapse">
        <ul class="list-group" id="lstbody{{ $info->sid }}" name="lstbody{{ $info->sid }}">
          ....
        </ul>
      </div>
    </div>
  </div>
    @php($allamount=floatval($allamount)+floatval($info->total_num))
  @endforeach

  <div class="alert alert-info w-100 h5">Total Amount: Php {{ number_format($allamount,2)}}</div>
  

</div>


<script>


function getOrders(orderid,lstid,status) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      oarray=JSON.parse(this.responseText);
      lstorders="<div class='container-sm'><table  class='table'> <tr><th>Product Name</th><th>Qty</th><th>Price</th><th>Total</th></tr>"
      
            for (let i = 0; i < oarray.length; i++) 
            {
                ordertotal=parseFloat(oarray[i].price) * parseFloat(oarray[i].quantity);
                lstorders+=" \
                    <tr>  \
                        <td>" +oarray[i].productname +"</td> \
                        <td> " +oarray[i].quantity +" </td> \
                        <td> " +oarray[i].price +" </td> \
                        <td> " +ordertotal +" </td> \
                    </tr>     \
                  ";
            }
      lstorders+="</table></div>";
      lstorders+="<div class='row container w-auto alert alert-danger'> \
                    <div class='col text-left'><b>STATUS | </b> &emsp; \
                        <i class='bi bi-shop h5'></i> &emsp; \
                        <i class='bi bi-arrow-right'></i>   \
                        <i class='bi bi-truck'></i> " +status 
                        +" <i class='bi bi-truck'></i> "
                        +" <i class='bi bi-arrow-right'></i> &emsp;  \
                        <i class='bi bi-house-heart h5'></i> \
                    </div> \
                 </div>";

      document.getElementById("lstbody" +lstid).innerHTML=lstorders;

       
    }
  };
  xhttp.open("GET", "/orders/" +orderid, true);
  xhttp.send();
}

</script>
@endsection