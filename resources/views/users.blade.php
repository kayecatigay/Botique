@extends('dashboard')

@section('content_title') Users @endsection
@section('content_title_link') <a href="#" class="fw-normal"> Users </a> @endsection 

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
              <td>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delmod{{ $usr->id }}">
                      Delete
                </button>
                <!-- DELETE Modal -->
                <div class="modal fade" id="delmod{{ $usr->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE USER ID: {{ $usr->id }}</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      Do you really want to delete this user:{{ $usr->name }} ?
                      </div>
                      <div class="modal-footer">
                          <form action ="deleteuser" method="POST" >
                              @csrf
                              <input type="hidden" id="deluserid" name="deluserid" value="{{ $usr->id }}">
                              <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod{{ $usr->id }}').modal('hide');" >Yes</button>
                          </form>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                      </div>
                      </div>
                  </div>
                  <!-- DELETE Modal -->
              </td>
          </tr>
      @endforeach
    </tbody>
  </table>
@endsection