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
                    <table class="table w-100" id="tblData">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="min-width: 250px;">Kode</th>
                                <th style="min-width: 250px;">Company Name</th>
                                <th>Owner</th>
                                <th>Tagline</th>
                                <th>Icon</th>
                                <th>About Us</th>
                                <th style="min-width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($companies as $row)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td >{{ $row->Kode }}</td>
                                <td >{{ $row->CompanyName }} </td>
                                <td >{{ $row->Owner }}</td>
                                <td >{{ $row->TagLine }}</td>
                                <td >{{ $row->Icon }}</td>
                                <td >{{ $row->AboutUs }}</td>
                                <td>
                                    <button class="btn btn-danger btn-xs rounded text-white editProfileCompany" data-id="{{ $row->Kode }}">Edit</button>
                                    <button class="btn btn-info btn-xs rounded text-white addDetailCompany" 
                                        data-id="{{ $row->Kode }}"
                                        data-company="{{ $row->CompanyName }}">
                                        Add Detail</button>
                                    <a href="{{ url('SetActive/' . $row->Kode . '/masterprofilecompany') }}" class="btn btn-warning btn-xs rounded text-white">
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
        <form action="{{ route('InsertSettingCompany') }}" method="post" id="formAdd">
            @csrf
            <input type="hidden" id="Kode" name="Kode"/>
            <div class="form-group">
                <label for="CompanyName">Company Name</label>
                <input class="form-control form-control-sm " type="text" id="CompanyName" name="CompanyName" placeholder="Company Name" required />
            </div> 
            <div class="form-group">
                <label for="Owner">Owner</label>
                <input class="form-control form-control-sm " type="text" id="Owner" name="Owner" placeholder="Owner" required />
            </div>
            <div class="form-group">
                <label for="Tagline">Tagline</label>
                <textarea class="form-control form-control-sm " id="Tagline" name="TagLine" required ></textarea>
            </div> 
            <div class="form-group">
                <label for="Icon">Icon</label>
                <input class="form-control form-control-sm " type="text" id="Icon" name="Icon" placeholder="Icon" required />
            </div> 
            <div class="form-group">
                <label for="AboutUs">About Us</label>
                <textarea class="form-control form-control-sm " id="AboutUs" name="AboutUs" required ></textarea>
            </div>
            <button class="btn btn-sm btn-danger rounded my-2 float-end btnAdd">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Add Detail Company Profile-->
<div class="modal fade" id="modalAddDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('InsertDetailCompany') }}" method="post"  >
            @csrf
            <input type="hidden" id="KodeDetail" name="KodeDetail"/>
            <div class="form-group">
                <label for="DetailCompanyName">Company Name</label>
                <input class="form-control form-control-sm " type="text" id="DetailCompanyName" name="DetailCompanyName" placeholder="Company Name" required />
            </div> 
            <div class="form-group">
                <label for="NameDetail">Name</label>
                <input class="form-control form-control-sm " type="text" id="NameDetail" name="NameDetail" placeholder="Name" required />
            </div>
            <div class="form-group">
                <label for="IconDetail">Icon</label>
                <input class="form-control form-control-sm " type="text" id="IconDetail" name="IconDetail" placeholder="Icon" required />
            </div> 
            <div class="form-group">
                <label for="LinkDetail">Link</label>
                <input class="form-control form-control-sm " type="text" id="LinkDetail" name="LinkDetail" placeholder="Link" required />
            </div> 
            <button class="btn btn-sm btn-danger rounded my-2 float-end ">Add Detail</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection