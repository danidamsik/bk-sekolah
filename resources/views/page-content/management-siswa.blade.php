@extends('app')

@section('content')
    <section class="space-y-8 pb-8" x-data="{ activeDetail: null }">
        @livewire('manajement-siswa.daftar-siswa')
    </section>
@endsection