<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Reservasi</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            padding: 30px;
            color: #000;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .summary-table {
            width: 100%;
            margin-bottom: 25px;
        }

        .summary-table td {
            padding: 6px 10px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #f2f2f2;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px 10px;
            text-align: left;
        }

        th {
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Laporan Reservasi Wisata</h2>

    {{-- Summary section --}}
    <table class="summary-table">
        <tr>
            <td>Total Reservasi</td>
            <td>: {{ $reservasis->count() }} transaksi</td>
        </tr>
        <tr>
            <td>Total Pendapatan</td>
            <td>: Rp {{ number_format($reservasis->sum('total_bayar'), 0, ',', '.') }}</td>
        </tr>
    </table>

    {{-- Detail Table --}}
    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 5%;">No</th>
                <th style="width: 30%;">Nama Paket Wisata</th>
                <th style="width: 25%;">Nama Pemesan</th>
                <th style="width: 20%;" class="text-right">Total Bayar</th>
                <th style="width: 20%;">Tanggal Reservasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservasis as $index => $res)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $res->paket->nama_paket ?? '-' }}</td>
                    <td>{{ $res->nama }}</td>
                    <td class="text-right">Rp {{ number_format($res->total_bayar, 0, ',', '.') }}</td>
                    <td>{{ $res->tgl_reservasi_wisata }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
