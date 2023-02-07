@extends('dashboard')
@section('content')
    <div class="container-fluid">
        <!-- PRODUCTS YEARLY SALES -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Products Monthly Sales</h3>
                    <div class="d-md-flex">
                        
                    </div>
                    <div>   
                        <canvas id="myChart" style="width:500%;max-width:700px"></canvas> 
                        <script>
                            var xValues = [50,60,70,80,90,100,110,120,130,140,150];
                            var yValues = [7,8,8,9,9,9,10,11,14,14,15];

                            new Chart("myChart", {
                            type: "line",
                            data: {
                                labels: xValues,
                                datasets: [{
                                fill: false,
                                lineTension: 0,
                                backgroundColor: "rgba(0,0,255,1.0)",
                                borderColor: "#000000",
                                data: yValues
                                }]
                            },
                            options: {
                                legend: {display: false},
                                scales: {
                                yAxes: [{ticks: {min: 6, max:16}}],
                                }
                            }
                            });
                        </script>

                        
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- RECENT SALES -->
        <!-- ============================================================== -->
        
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">Recent sales</h3>
                        <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                            <select class="form-select shadow-none row border-top">
                                <option>January 2023</option>
                                <option>February 2023</option>
                                <option>March 2023</option>
                                <option>April 2023</option>
                                <option>May 2023</option>
                                <option>June 2023</option>
                                <option>July 2023</option>
                                <option>August 2023</option>
                                <option>September 2023</option>
                                <option>October 2023</option>
                                <option>November 2023</option>
                                <option>December 2023</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Id</th>
                                    <th class="border-top-0">Order number</th>
                                    <th class="border-top-0">User Id</th>
                                    <th class="border-top-0">Address</th>
                                    <th class="border-top-0">Contact Number</th>
                                    <th class="border-top-0">Payment Type</th>
                                    <th class="border-top-0">Discount</th>
                                    <th class="border-top-0">Total Price</th>
                                    <th class="border-top-0">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $s)
                                    <tr>
                                        <td>{{ $s->id }}</td>
                                        <td>{{ $s->order_num }}</td>
                                        <td class="txt-oflo">{{ $s->user_id }}</td>
                                        <td>{{ $s->address }}</td>
                                        <td>{{ $s->contact_num }}</td>
                                        <td>{{ $s->payment_type }}</td>
                                        <td>{{ $s->discount }}</td>
                                        <td><span class="text-success">Php {{ number_format ($s->total_num,2) }}</span></td>
                                        <td class="txt-oflo">{{ $s->date_sales }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop