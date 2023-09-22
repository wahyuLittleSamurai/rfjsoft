@extends('Admin.main', ['sidebars' => $sidebars])

@section('content')
    <div class="card m-2">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h4 class="float-start"><strong>Data Staff</strong></h4>
                    <button class="btn btn-sm btn-warning text-white float-end" id="btnAddStaff" 
                        data-toggle="modal" data-target="#modalStaff">Add Staff</button>
                </div>
                <div class="col-12">
                    <table class="table w-100" id="tblDataStaff">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Staff</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Position</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($staffs as $row)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td >{{ $row->Kode }}</td>
                                <td >{{ $row->StaffName }} </td>
                                <td >{{ $row->Phone }}</td>
                                <td >{{ $row->Email }}</td>
                                <td >{{ $row->Address }}</td>
                                <td >{{ $row->Position }}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="modalStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection