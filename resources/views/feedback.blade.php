@extends('dashboard')

@section('content_title') Feedback @endsection
@section('content_title_link') <a href="#" class="fw-normal"> Feedback </a> @endsection 

@section('content')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email </th>
            <th scope="col">Contact Number</th>
            <th scope="col">Message</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($message as $mess)
            <tr>
                <th scope="row">{{ $mess->name }}</th>
                <td>{{ $mess->email }}</td>
                <td>{{ $mess->contactnum }}</td>
                <td>{{ $mess->messages }}</td> 
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection