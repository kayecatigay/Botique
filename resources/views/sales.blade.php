@extends('dashboard')

@section('content_title') Sales @endsection
@section('content_title_link') <a href="#" class="fw-normal"> Sales </a> @endsection 

@section('content')

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
                    <th class="border-top-0">Status</th>      
                    <th class="border-top-0">Action</th>      
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
                        <td>{{ $s->status }}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModal"
                             onclick="javascript:document.getElementById('salesid').value='{{ $s->id }}';">
                            Update</button>
                            &emsp;
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> <i class="bi bi-bookmark-check"></i>Update Status</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action ="updatesales" method="POST" >
            <div class="modal-body">
                @csrf
                <input type="hidden" id="salesid" name="salesid" value="">
                <select id="stat" name="stat" class="form-control">
                    @foreach ($xstatus as $xs)
                    <option value="{{ $xs->id}}"> {{ $xs->Sname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" onclick="javascript:$('updateModal').modal('hide');" >Update</button>
            </div>
      </form>

    </div>
  </div>
</div>

@endsection