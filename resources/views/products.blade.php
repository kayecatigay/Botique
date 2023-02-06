@extends('dashboard')

@section('content_title') Products @endsection
@section('content_title_link') <a href="#" class="fw-normal"> Products </a> @endsection 

@section('content')

<div class="container-fluid">
<a class='btn btn-primary' href="/addproduct">Add</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Product Id </th>
            <th scope="col">Product Name</th>
            <th scope="col">Category</th>
            <th scope="col">Product Price</th>
            <th scope="col">Product Quantity</th>
            <th scope="col">Product Image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $prd)
            <tr>
                <th scope="row">{{ $prd->id }}</th>
                <td>{{ $prd->productname }}</td>
                <td>{{ $prd->category }}</td>
                <td>{{ $prd->price }}</td>
                <td>{{ $prd->quantity }}</td>
                <td><img src="uploads/{{ $prd->image }}" width="100" height="100" /></td>
                <td>
                    <form action ="editproduct" method="get" enctype="multipart/form-data">
                        <input type="hidden" id="txtid" name="txtid" value="{{ $prd->id }}"><br> 
                        <input type="submit" class="btn btn-info" value="Edit" name="submit">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection