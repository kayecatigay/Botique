@extends('home')
@section('maincontent')
    @section('new arrivals')
        <div class="new_arrivals">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="section_title new_arrivals_title">
                            <h2>New Arrivals</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col text-center">
                        <div class="new_arrivals_sorting">
                            <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*"><a href="/">all</a></li>
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men"><a href="/category/1">Men's</a></li>
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women"><a href="/category/2">Women's</a></li>
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories"><a href="/category/3">Accesories</a></li>
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men"><a href="/category/4">Skin Care</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                            @if(isset($products))
                                <!-- Products -->
                                
                                    @foreach ($products as $prd)
                                    <div class="product-item men">
                                        <div class="product product_filter">
                                            <div class="product_image">
                                                <img src="uploads/{{ $prd->image }}" alt="">
                                            </div>
                                            <div class="favorite"></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="single.html">{{$prd->productname}}</a></h6>
                                                <div class="product_price">Php {{number_format($prd->price,2) }}</div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button">
                                            {{ Form::open(array('url' => '/SavetoCart')) }}
                                                {{ Form::hidden('id',$prd->id)}}
                                                <button type="submit" class="red_button add_to_cart_button">Add to Cart</button>
                                            {{ Form::close() }}
                                        </div>
                                            
                                        <div>

                                        </div>
                                    </div>
                                    @endforeach
                                

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @show
@stop