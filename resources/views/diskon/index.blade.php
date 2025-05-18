@extends('be.master')
@section('content')
<hr class="border-light container-m--x my-4">
<div class="row">
    <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
        <h3 class="font-weight-bold align-items-center mt-3">Diskon</h3>
        <div class="ms-auto">
            <a href="{{ route('diskonM.create') }}" type="submit" class="btn btn-round btn-outline-success">
                <i class="feather icon-plus-circle mr-2"></i>Add New Diskon
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
                    <th>Nama Diskon</th>
                    <th>Persentase %</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Berakhir</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($diskons as $diskon)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $diskon->nama_diskon ?? '' }}</td>
                        <td>{{ $diskon->persentase_diskon }}%</td>
                        <td>{{ $diskon->tanggal_mulai ?? '' }}</td>
                        <td>{{ $diskon->tanggal_berakhir ?? '' }}</td>
                        <td><a href="javascript:void(0)" class="badge badge-pill {{ $diskon->status == 'aktif' ? 'badge-outline-info' : 'badge-outline-primary' }}">{{ $diskon->status }}</a></td>
                        <td class="p-0 text-center align-middle">
                            <div class="btn-group" role="group">
                                <a href="{{ route('diskonM.edit', $diskon->id) }}" type="button" class="btn btn-warning"><i class="feather icon-edit-1"></i></a>
                                <form action="{{ route('diskonM.destroy', $diskon->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="feather icon-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form>
@endsection