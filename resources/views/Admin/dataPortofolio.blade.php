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
                    <button class="btn btn-sm btn-warning text-white float-end" id="btnAddPortofolio" >
                        Add
                    </button>
                </div>
                <div class="col-12 w-100 m-0 p-0">
                    <table class="table w-100 m-0 p-0" id="tblPortofolio">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="min-width: 250px;">Kode</th>
                                <th style="min-width: 250px;">Nama Service</th>
                                <th style="min-width: 250px;">Nama Portofolio</th>
                                <th >Photo</th>
                                <th >Link</th>
                                <th style="min-width: 250px;">Detail Portofolio</th>
                                <th style="min-width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($portofolios["datas"] as $row)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td >{{ $row->Kode }}</td>
                            <td >{{ $row->ServiceName }} </td>
                            <td >{{ $row->PortofolioName }}</td>
                            <td >{{ $row->Photo }}</td>
                            <td >{{ $row->Link }}</td>
                            <td >{{ $row->DetailPortofolio }}</td>
                            <td>
                                <button class="btn btn-danger btn-xs rounded text-white editPortofolio" data-id="{{ $row->Kode }}">Edit</button>
                                <a href="{{ url('SetActive/' . $row->Kode . '/portofolio') }}" class="btn btn-warning btn-xs rounded text-white">
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
<div class="modal fade" id="modalPortofolio" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="{{ route('InsertPortofolio') }}" method="post" id="formAdd" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="Kode" name="Kode"/>
            <div class="form-group">
                <label for="ServiceName">Service Name</label>
                <select class="form-control form-control-sm" name="ServiceName" id="ServiceName">
                    @foreach ($portofolios["services"] as $r)
                    <option value="{{ $r->Kode }}">{{ $r->ServiceName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="PortofolioName">Portofolio Name</label>
                <input class="form-control form-control-sm " type="text" id="PortofolioName" name="PortofolioName" placeholder="Portofolio Name" required />
            </div> 
            <div class="form-group">
                <label for="Link">Link</label>
                <input class="form-control form-control-sm "  id="Link"  name="Link" />
            </div>
            <div class="form-group">
                <label for="Photo">Photo</label>
                <input class="form-control form-control-sm " accept="image/png, image/jpeg" type="file" 
                    id="Photo" name="Photo" required />
            </div> 
            <div class="form-group">
                <label for="DetailPortofolio">Detail Portofolio</label>
                <textarea class="form-control form-control-sm " type="text" 
                    id="DetailPortofolio" name="DetailPortofolio" > </textarea>
            </div> 
            <button class="btn btn-sm btn-danger rounded my-2 float-end btnAdd">Add Portofolio</button>
        </form>

      </div>
    </div>
  </div>
</div> 
@endsection