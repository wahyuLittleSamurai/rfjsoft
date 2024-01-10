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
                    <button class="btn btn-sm btn-warning text-white float-end" id="btnAddSeoHeader" 
                        data-toggle="modal" data-target="#modalAddSeoHeader">Add</button>
                </div>
                <div class="col-12">
                    <table class="table w-100" id="tblDataSeoHeader">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="min-width: 250px;">Kode</th>
                                <th style="min-width: 250px;">Link Param</th>
                                <th>Isi</th>
                                <th>Name</th>
                                <th>Grup</th>
                                <th style="min-width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($datas["datas"] as $row)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td >{{ $row->Kode }}</td>
                                <td >{{ $row->LinkParam }} </td>
                                <td >{{ $row->Isi }}</td>
                                <td >{{ $row->Name }}</td>
                                <td >{{ $row->Grup }}</td>
                                <td>
                                    <button class="btn btn-danger btn-xs rounded text-white editSeoHeader" 
                                        data-id="{{ $row->Kode }}">Edit</button>
                                    <a href="{{ url('SetActive/' . $row->Kode . '/masterseoheader') }}" class="btn btn-warning btn-xs rounded text-white">
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
<div class="modal fade" id="modalAddSeoHeader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('InsertSeoHeader') }}" method="post" id="formAdd">
            @csrf
            <input type="hidden" id="Kode" name="Kode"/>
            <div class="form-group">
                <label for="LinkParam">Link Param</label>
                <input class="form-control form-control-sm " type="text" id="LinkParam" name="LinkParam" placeholder="Link Param" required />
            </div> 
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input class="form-control form-control-sm " type="text" id="Nama" name="Nama" placeholder="Nama" required />
            </div>
            <div class="form-group">
                <label for="Isi">Isi</label>
                <textarea class="form-control form-control-sm " id="Isi" name="Isi" required ></textarea>
            </div> 
            <div class="form-group">
                <label for="Grup">Grup</label>
                <input class="form-control form-control-sm " type="text" id="Grup" name="Grup" placeholder="Grup" required />
            </div> 
            <button class="btn btn-sm btn-danger rounded my-2 float-end btnAdd">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
