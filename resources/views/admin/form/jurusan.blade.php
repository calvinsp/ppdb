@extends('admin.layouts.template')

@section('content')
<form action="{{ route('admin.tambah') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Jurusan</label>
        <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="nama jurusan">
        @error('nama_jurusan')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Singkatan</label>
        <input type="text" class="form-control" id="singkatan" name="singkatan" placeholder="singkatan jurusan">
        @error('singkatan')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
        @error('deskripsi')
        <div class="text-danger">{{$message}}</div>
    @enderror
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection
