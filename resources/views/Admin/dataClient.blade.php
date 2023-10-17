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
                    <h4 class="float-start"><strong>Data </strong></h4>
                    <button class="btn btn-sm btn-warning text-white float-end" id="btnAdd" 
                        data-toggle="modal" data-target="#modalAdd">Add</button>
                </div>
                <div class="col-12">
                    <table class="table w-100" id="tblDataService">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="min-width: 250px;">Kode</th>
                                <th style="min-width: 250px;">Client Name</th>
                                <th style="min-width: 250px;">Address</th>
                                <th>Phone</th>
                                <th >Email</th>
                                <th >NPWP</th>
                                <th >Logo</th>
                                <th style="min-width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $row)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td >{{ $row->Kode }}</td>
                                <td >{{ $row->ClientName }} </td>
                                <td >{{ $row->Address }}</td>
                                <td >{{ $row->Phone }}</td>
                                <td >{{ $row->Email }}</td>
                                <td >{{ $row->NPWP }}</td>
                                <td >{{ $row->Logo }}</td>
                                <td>
                                    <button class="btn btn-danger btn-xs rounded text-white editService" data-id="{{ $row->Kode }}">Edit</button>
                                    <a href="{{ url('SetActive/' . $row->Kode . '/masterclient') }}" class="btn btn-warning btn-xs rounded text-white">
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
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('InsertClient') }}" method="post" id="formAdd" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="Kode" name="Kode"/>
            <div class="form-group">
                <label for="ClientName">Client Name</label>
                <input class="form-control form-control-sm " type="text" id="ClientName" name="ClientName" placeholder="Client Name" required />
            </div> 
            <div class="form-group">
                <label for="Address">Address</label>
                <textarea class="form-control form-control-sm "  id="Address" 
                    name="Address"  required ></textarea>
            </div>
            <div class="form-group">
                <label for="Phone">Phone</label>
                <input class="form-control form-control-sm " type="telp" id="Phone" name="Phone" placeholder="Phone" required />
            </div> 
            <div class="form-group">
                <label for="NPWP">NPWP</label>
                <input class="form-control form-control-sm " type="text" id="NPWP" name="NPWP" placeholder="NPWP" required />
            </div> 
            <div class="form-group">
                <label for="Email">Email</label>
                <input class="form-control form-control-sm " type="email" id="Email" name="Email" placeholder="Email@email.com" required />
            </div> 
            <div class="form-group">
                <label for="Logo">Logo</label>
                <input class="form-control form-control-sm " type="file" id="Logo" name="Logo" required />
            </div> 
            <button class="btn btn-sm btn-danger rounded my-2 float-end btnAdd">Add Client</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection