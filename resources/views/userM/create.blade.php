@extends('be.master')
@section('content')
<div class="card mb-4">
    <h4 class="card-header">Create new user</h4>
    <div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('userM.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <input type="text" name="nama_karyawan" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="no_hp">Nomor Handphone</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <select name="jabatan" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="bendahara">Bendahara</option>
                    <option value="pemilik">Pemilik</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
                <button type="submit" class="btn btn-secondary">Add new user</button>
                <a href="{{ route('userM') }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>

@endsection