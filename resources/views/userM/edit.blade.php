@extends('be.master')
@section('content')
<div class="card mb-4">
    <h4 class="card-header">Edit user</h4>
    <div class="card-body">
        <form action="{{ route('userM.update', $user->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <input type="text" name="nama_karyawan" class="form-control" value="{{ $user->karyawan->nama_karyawan ?? '' }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ $user->karyawan->no_hp ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control">{{ $user->karyawan->alamat ?? '' }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('userM') }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>
@endsection