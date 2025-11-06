<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Rekap Pelanggaran Per Kelas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #333;
            padding-bottom: 10px;
        }

        .header h2 {
            margin: 5px 0;
            color: #333;
        }

        .info {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table thead {
            background-color: #4472C4;
            color: white;
        }

        table thead th {
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }

        table tbody td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f0f0f0;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #666;
        }

        .summary {
            margin-top: 20px;
            padding: 10px;
            background-color: #f5f5f5;
            border-left: 4px solid #4472C4;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>REKAPITULASI PELANGGARAN SISWA</h2>
        <h3>PER KELAS</h3>
    </div>

    <div class="info">
        <table style="border: none;">
            <tr>
                <td style="border: none; width: 150px;"><strong>Tanggal Cetak</strong></td>
                <td style="border: none;">: {{ date('d/m/Y H:i:s') }}</td>
            </tr>
            <tr>
                <td style="border: none;"><strong>Periode</strong></td>
                <td style="border: none;">: {{ $periode ?? 'Semua Data' }}</td>
            </tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 5%;">No</th>
                <th style="width: 25%;">Kelas</th>
                <th class="text-center" style="width: 20%;">Jumlah Siswa Melanggar</th>
                <th class="text-center" style="width: 20%;">Total Pelanggaran</th>
                <th class="text-center" style="width: 15%;">Total Point</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td class="text-center">{{ $item->jumlah_siswa_melanggar }}</td>
                    <td class="text-center">{{ $item->total_pelanggaran }}</td>
                    <td class="text-center">{{ $item->total_point }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="summary">
        <strong>Ringkasan:</strong><br>
        Total Kelas: {{ count($data) }}<br>
        Total Siswa Melanggar: {{ $data->sum('jumlah_siswa_melanggar') }}<br>
        Total Pelanggaran: {{ $data->sum('total_pelanggaran') }}<br>
        Total Point: {{ $data->sum('total_point') }}
    </div>

    <div class="footer">
        <p>Dicetak pada: {{ date('d/m/Y H:i:s') }}</p>
    </div>
</body>

</html>
