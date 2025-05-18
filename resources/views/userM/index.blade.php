@extends('be.master')
@section('title', 'User Management')
@section('content')
<hr class="border-light container-m--x my-4">
<div class="card col-12">
  <div class="row">
    <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
      <h3 class="font-weight-bold align-items-center mt-3">User Management</h3>
      <div class="ms-auto">
        <a href="{{ route('userM.create') }}" type="submit" class="btn btn-round btn-outline-success">
          <i class="feather icon-plus-circle mr-2"></i>Add New User
        </a>
      </div>
    </div>
  </div>
  <form action="" method="post">
    @csrf
    <div class="table-responsive">
      <table class="table table-hover table-striped">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No_hp</th>
            <th>Jabatan</th>
            <th>Aktif</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $index => $user)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $user->karyawan->nama_karyawan ?? 'default' }}</td>
            <td>{{ $user->email }}</td>
            <td class="text-truncate" style="max-width: 200px;" title="{{ $user->karyawan->alamat ?? 'user' }}">
              {{ \Illuminate\Support\Str::limit($user->karyawan->alamat ?? 'default', 20) }}
            </td>            
            <td>{{ $user->karyawan->no_hp ?? 'default' }}</td>
            <td>{{ $user->karyawan->jabatan ?? 'default' }}</td>
            <td><a href="javascript:void(0)" class="badge badge-pill badge-outline-warning">{{ $user->aktif ? 'Aktif' : 'Tidak Aktif' }}</a></td>
            <td><a href="javascript:void(0)" class="badge badge-pill badge-outline-success">{{ $user->aktif ? 'Aktif' : 'Banned' }}</a></td>
            <td class="p-0 text-center align-middle">
                <div class="btn-group" role="group">
                  <a href="{{ route('userM.edit', $user->id) }}" type="button" class="btn btn-warning"><i class="feather icon-edit-1"></i></a>
                  @if($user->aktif)
                  <form action="{{ route('userM.ban', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin ban user ini?')">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-danger"><i class="feather icon-user-x"></i></button>
                  </form>
                  @elseif($user->status == 0)
                  <form action="{{ route('userM.unban', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin unban user ini?')">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-success"><i class="feather icon-user-check"></i></button>
                  </form>
                  @endif
                </div>                    
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </form>
</div>
@endsection