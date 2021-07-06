@extends('admin.layouts.template')

@section('content')
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tabel Jurusan</h1>
                        <a href="{{route('admin.form-jurusan')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah jurusan</a>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    @if(session('sukses'))
                    	<div class="alert alert-success d-flex align-items-center" role="alert">
						  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						  <div>
						    {{session('sukses')}}
						  </div>
						</div>
						@endif
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Jurusan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jurusan</th>
                                            <th>Singkatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php  $no=1;
						            foreach ($jrs as $val){
                                        echo"<tr>
                                            <td>".$no++."</td>
                                            <td>".$val->nama_jurusan."</td>
                                            <td>".$val->singkatan."</td>
                                            <td>
                                                <a href='#' data-toggle='modal' data-target='#editModal' style='color: grey;' onClick=\"SetInput('".$val->id."','".$val->nama_jurusan."','".$val->singkatan."','".$val->deskripsi."')\"><i class='fas fa-pencil-alt'></i></a> |
                                                <a href='#'' data-toggle='modal' data-target='#deleteModal' style='color: red;' onclick='myFunction()' id='demo'><i class='fas fa-trash'></i></a>
                                            </td>
                                            </tr>";

                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin untuk hapus jurusan</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    @foreach ($jrs as $val)
                    <form action="{{route('admin.destroy', $val->id)}}" method="post">
                        @endforeach
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Delete
                        </button>
                      </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jurusan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @foreach ($jrs as $val)
            <form class="modal-body" action="{{route('admin.edit', $val->id)}}" method="POST">
                @endforeach
                @csrf
                @method('PATCH')
                <input type="text" hidden class="form-control" id="id" name="id_jurusan" >
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Jurusan</label>
                    <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="name jurusan"
                    >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Singkatan</label>
                    <input type="text" class="form-control" id="singkatan" name="singkatan" placeholder="singkatan jurusan"
                    >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                    ></textarea>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function SetInput(id, nama_jurusan,singkatan,deskripsi) {
        document.getElementById('id').value = id;
        document.getElementById('nama_jurusan').value = nama_jurusan;
        document.getElementById('singkatan').value = singkatan;
        document.getElementById('deskripsi').value = deskripsi;
    }
</script>

            <!-- End of Main Content -->
@endsection
