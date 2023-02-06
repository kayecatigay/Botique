@extends('dashboard')
@section('content')

<a class='btn btn-primary' href="/addvoucher">Add</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Voucher Code </th>
            <th scope="col">Voucher Name</th>
            <th scope="col">Voucher Percentage</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($voucher as $vchr)
            <tr>
                <th scope="row">{{ $vchr->id }}</th>
                <td>{{ $vchr->Vcode }}</td>
                <td>{{ $vchr->Vname }}</td>
                <td>{{ $vchr->Vpercentage }}</td>
                <td>
                    <form action ="/editvoucher" method="get" enctype="multipart/form-data">
                        <input type="hidden" id="vchrid" name="vchrid" value="{{ $vchr->id }}"><br> 
                        <input type="submit" class="btn btn-info" value="Edit" name="submit">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection