@extends('dashboard')
@section('content')
    <br><h2>Users</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col"> Id </th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($user as $usr)
          <tr>
              <th scope="row">{{ $usr->id }}</th>
              <td>{{ $usr->name }}</td>
              <td>{{ $usr->email }}</td>
              <td><a class='btn btn-danger' href="deleteuser/{{ $usr->id }}">Delete</a></td>
          </tr>
      @endforeach
    </tbody>
  </table>
@endsection