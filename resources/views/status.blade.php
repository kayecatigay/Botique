@extends('dashboard')

@section('content_title') Status @endsection
@section('content_title_link') <a href="#" class="fw-normal"> Status </a> @endsection 

@section('content')

    <div class="table-responsive">
    <a class='btn btn-primary' href="/addstat">Add</a>
            <table class="table no-wrap">
                <thead>
                    <tr>
                        <th class="border-top-0">Id</th>
                        <th class="border-top-0">Status Name</th>
                        <th class="border-top-0">Action</th>      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stat as $s)
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td>{{ $s->Sname }}</td>
                            <td>
                                <span class="input-group">

                                <form action ="/editstat" method="get">
                                    <input type="hidden" id="statid" name="statid" value="{{ $s->id }}">
                                    <input type="submit" class="btn btn-info" value="Edit" name="submit">
                                </form>
                                &emsp;

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delmod{{ $s->id }}">
                                    Delete
                                </button>

                                    <!-- DELETE Modal -->
                                    <div class="modal fade" id="delmod{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $s->id }} </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you really want to delete this status: {{ $s->Sname }}?
                                        </div>
                                        <div class="modal-footer">
                                            <form action ="deletestat" method="POST" >
                                                @csrf
                                                <input type="hidden" id="dels" name="dels" value="{{ $s->id }}">
                                                <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod{{ $s->id }}').modal('hide');" >Yes</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- DELETE Modal -->

                                </div>
                            </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

@endsection