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
                                <th style="min-width: 250px;">Service Name</th>
                                <th>Detail Service</th>
                                <th>Icon</th>
                                <th>Link Detail</th>
                                <th style="min-width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($services as $row)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td >{{ $row->Kode }}</td>
                                <td >{{ $row->ServiceName }} </td>
                                <td >{{ $row->DetailService }}</td>
                                <td >{{ $row->Icon }}</td>
                                <td >{{ $row->LinkDetail }}</td>
                                <td>
                                    <a href="{{ url('SetActive/' . $row->Kode . '/masterservice') }}" class="btn btn-warning btn-xs rounded text-white">
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
        <form action="{{ route('InsertService') }}" method="post" id="formAdd">
            @csrf
            <input type="hidden" id="Kode" name="Kode"/>
            <div class="form-group">
                <label for="ServiceName">Service Name</label>
                <input class="form-control form-control-sm " type="text" id="ServiceName" name="ServiceName" placeholder="Service Name" required />
            </div> 
            <div class="form-group">
                <label for="DetailService">Detail Service</label>
                <textarea class="form-control form-control-sm "  id="DetailService" 
                    name="DetailService"  required ></textarea>
            </div>
            <div class="form-group">
                <label for="Icon">Icon</label>
                <input class="form-control form-control-sm " type="text" id="Icon" name="Icon" placeholder="Icon" required />
            </div> 
            <div class="form-group">
                <label for="LinkDetail">Link Detail</label>
                <input class="form-control form-control-sm " id="LinkDetail" name="LinkDetail" required />
            </div> 
            <button class="btn btn-sm btn-danger rounded my-2 float-end btnAdd">Add Service</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection