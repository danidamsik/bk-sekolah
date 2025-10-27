@extends('app')

@section('content')
    <div class="p-6 space-y-8">

        <!-- ========================================================= -->
        <!-- Component 1 : Button Aksi Ekspor & Cetak -->
        <!-- ========================================================= -->
        @livewire('management-pelanggaran.rekap-laporan.button-rekap-laporan')
        <!-- End Component 1 -->

        <!-- ========================================================= -->
        <!-- Component 2 : Rekap Pelanggaran Per Siswa -->
        <!-- ========================================================= -->
        @livewire('management-pelanggaran.rekap-laporan.table-siswa-rekap-laporan')
        <!-- End Component 2 -->

        <!-- ========================================================= -->
        <!-- Component 3 : Rekap Pelanggaran Per Kelas -->
        <!-- ========================================================= -->
        @livewire('management-pelanggaran.rekap-laporan.table-kelas-rekap-laporan')
        <!-- End Component 3 -->

    </div>

@endsection
