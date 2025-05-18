<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nota Reservasi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 13px;
            color: #333;
            padding: 30px;
        }

        .nota-header {
            text-align: center;
            border-bottom: 2px solid #444;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .nota-header h2 {
            margin: 0;
            font-size: 22px;
            color: #0d6efd;
        }

        .info {
            margin-bottom: 20px;
        }

        .info p {
            margin: 3px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px 10px;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .total {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
        }

        .footer {
            margin-top: 40px;
            font-style: italic;
            color: #666;
        }

        .highlight {
            background-color: #e7f1ff;
        }
    </style>
</head>
<body>
    <div class="nota-header">
        <h2>Nota Reservasi Wisata</h2>
        <p>Desa Wisata - Sistem Reservasi</p>
    </div>

    <div class="info">
        <p><strong>ID Reservasi:</strong> {{ $reservasi->id }}</p>
        <p><strong>Nama Pelanggan:</strong> {{ $reservasi->nama }}</p>
        <p><strong>Email:</strong> {{ $reservasi->email }}</p>
        <p><strong>Tanggal Reservasi:</strong> {{ $reservasi->tgl_reservasi_wisata }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Paket</th>
                <th>Jumlah Peserta</th>
                <th>Harga per Orang</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr class="highlight">
                <td>{{ $reservasi->paket->nama_paket }}</td>
                <td>{{ $reservasi->jumlah_peserta }} org</td>
                <td>Rp {{ number_format($reservasi->harga, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($reservasi->harga * $reservasi->jumlah_peserta, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <p class="total">Total Bayar: Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</p>

    <div class="footer">
        Terima kasih telah melakukan reservasi bersama kami.<br>
        Tunjukkan nota ini kepada petugas saat memulai perjalanan wisata Anda.
    </div>
</body>
</html>
