@extends('app')

@section('content')
    <div class="max-w-7xl mx-auto px-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>
        @livewire('dashboard.report-pelanggaran')
        @livewire('dashboard.analisis-pelanggaran')
    @endsection
