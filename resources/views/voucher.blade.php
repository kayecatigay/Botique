@extends('dashboard')

@section('content_title') Voucher @endsection
@section('content_title_link') <a href="#" class="fw-normal"> Voucher </a> @endsection 

@section('content')

<a class='btn btn-primary' href="/addvoucher">Add</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Voucher Code </th>
            <th scope="col">Voucher Name</th>
            <th scope="col">Discount (%)</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($voucher as $vchr)
            <tr>
                <th scope="row">{{ $vchr->id }}</th>
                <td>{{ $vchr->Vcode }}</td>
                <td>{{ $vchr->Vname }}</td>
                <td>{{ floatval($vchr->Vpercentage)*100 }}</td>
                <td>
                    <span class="input-group">
                        <form action ="/editvoucher" method="get">
                            <input type="hidden" id="vchrid" name="vchrid" value="{{ $vchr->id }}">
                            <input type="submit" class="btn btn-info" value="Edit" name="submit">
                        </form>
                        &emsp;

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delmod{{ $vchr->id }}">
                            Delete
                        </button>

                            <!-- DELETE Modal -->
                            <div class="modal fade" id="delmod{{ $vchr->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-octagon-fill text-danger"></i> DELETE RECORD ID: {{ $vchr->id }} </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                Do you really want to delete this voucher: {{ $vchr->Vname }}?
                                </div>
                                <div class="modal-footer">
                                    <form action ="deletevoucher" method="POST" >
                                        @csrf
                                        <input type="hidden" id="vdelchrid" name="vdelchrid" value="{{ $vchr->id }}">
                                        <button type="submit" class="btn btn-danger" onclick="javascript:$('#delmod{{ $vchr->id }}').modal('hide');" >Yes</button>
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

@endsection