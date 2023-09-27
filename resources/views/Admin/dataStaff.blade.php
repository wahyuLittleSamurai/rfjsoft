@extends('Admin.main', ['sidebars' => $sidebars])

@section('content')
    <div class="card m-2">
        <div class="card-body">
            <div class="row">
                @if($errors->any())
                <div class="col-12 mb-2">
                    <small><label class="text-xs text-white bg-danger rounded">{{ $errors->first() }}</label></small>
                </div>
                @endif
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
                                <th style="min-width: 250px;">Kode</th>
                                <th style="min-width: 250px;">Nama Staff</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th style="min-width: 350px;">Address</th>
                                <th>Position</th>
                                <th style="min-width: 250px;">Action</th>
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
                                <td>
                                    <button class="btn btn-danger btn-xs rounded text-white">Edit</button>
                                    <a href="{{ url('SetActive/' . $row->Kode . '/masterstaff') }}" class="btn btn-warning btn-xs rounded text-white">
                                        @if( $row->IsActive == '1' )
                                            Non-Active
                                        @else
                                            Active
                                        @endif
                                    </a>
                                </td>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('InsertDataStaff') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="Username">Username</label>
                <input class="form-control form-control-sm " type="text" id="Username" name="Username" placeholder="Username" required />
            </div> 
            <div class="form-group">
                <label for="Password">Password</label>
                <input class="form-control form-control-sm " type="password" id="Password" name="Password" placeholder="Password" required />
            </div>
            <div class="form-group">
                <label for="Phone">Phone</label>
                <input class="form-control form-control-sm " type="phone" id="Phone" name="Phone" placeholder="Phone" required />
            </div> 
            <div class="form-group">
                <label for="Email">Email</label>
                <input class="form-control form-control-sm " type="email" id="Email" name="Email" placeholder="Email" required />
            </div> 
            <div class="form-group">
                <label for="Address">Address</label>
                <input class="form-control form-control-sm " type="text" id="Address" name="Address" placeholder="Address" required />
            </div> 
            <div class="form-group">
                <label for="Position">Position</label>
                <input class="form-control form-control-sm " type="text" id="Position" name="Position" placeholder="Position" required />
            </div> 
            <button class="btn btn-sm btn-danger rounded my-2 float-end">Register</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection