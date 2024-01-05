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
                    <button class="btn btn-sm btn-warning text-white float-end" id="btnAddTopMenu" >
                        Add
                    </button>
                </div>
                <div class="col-12 w-100 m-0 p-0">
                    <table class="table w-100 m-0 p-0" id="tblTopMenu">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="min-width: 250px;">Kode</th>
                                <th style="min-width: 250px;">Menu</th>
                                <th style="min-width: 250px;">Link</th>
                                <th >Icon</th>
                                <th style="min-width: 250px;">Isi</th>
                                <th style="min-width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($menus["datas"] as $row)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td >{{ $row->Kode }}</td>
                            <td >{{ $row->Menu }} </td>
                            <td >{{ $row->Link }}</td>
                            <td >{{ $row->Icon }}</td>
                            <td >{{ $row->Isi }}</td>
                            <td>
                                <button class="btn btn-danger btn-xs rounded text-white editTopBar" data-id="{{ $row->Kode }}">Edit</button>
                                <a href="{{ url('SetActive/' . $row->Kode . '/mastertopbar') }}" class="btn btn-warning btn-xs rounded text-white">
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
<div class="modal fade" id="modalTopMenu" tabindex="-1" role="dialog" 
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
        
        <form action="{{ route('InsertTopMenu') }}" method="post" id="formAdd">
            @csrf
            <input type="hidden" id="Kode" name="Kode"/>
            <div class="form-group">
                <label for="Menu">Menu</label>
                <input class="form-control form-control-sm " type="text" id="Menu" name="Menu" placeholder="Menu" required />
            </div> 
            <div class="form-group">
                <label for="Link">Link</label>
                <input class="form-control form-control-sm " type="text" id="Link"  name="Link" />
            </div>
            <div class="form-group">
                <label for="Icon">Icon</label>
                <input class="form-control form-control-sm "  type="text" id="Icon" name="Icon" required />
            </div> 
            <div class="form-group">
                <label for="Isi">Isi</label>
                <textarea class="form-control form-control-sm " type="text" id="Isi" name="Isi" > </textarea>
            </div> 
            <button class="btn btn-sm btn-danger rounded my-2 float-end btnAdd">Add Top Menu</button>
        </form>

      </div>
    </div>
  </div>
</div> 
@endsection