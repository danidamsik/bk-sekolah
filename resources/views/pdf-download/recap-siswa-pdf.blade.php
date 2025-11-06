<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Rekap Pelanggaran per Siswa</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }
    </style>
</head>

<body>
    <h2>Rekap Pelanggaran per Siswa</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Total Pelanggaran</th>
                <th>Total Poin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->kelas ?? '-' }}</td>
                    <td>{{ $item->total_pelanggaran }}</td>
                    <td>{{ $item->total_point }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
