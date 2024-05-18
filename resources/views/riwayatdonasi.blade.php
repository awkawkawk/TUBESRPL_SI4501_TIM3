@extends('layouts.app')

@section('title', 'Riwayat Donasi')

@section('content')
<div class="container">
    <h1>Riwayat Donasi</h1>
    @foreach($histories as $history)
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('path/to/image') }}" class="img-fluid rounded-start" alt="Campaign Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $history->campaign->name }}</h5>
                    <p class="card-text"><small class="text-muted">{{ $history->campaign->location }}</small></p>
                    <p class="card-text">{{ \Carbon\Carbon::parse($history->created_at)->format('d M Y') }}</p>
                    <div class="row">
                        <div class="col">
                            <h6>Donasi Masuk:</h6>
                            <ul class="list-unstyled">
                                @if($history->jasa_kirim)
                                <li>Jasa Kirim: {{ $history->jasa_kirim }}</li>
                                @endif
                                @if($history->nomor_resi)
                                <li>Nomor Resi: {{ $history->nomor_resi }}</li>
                                @endif
                                @if($history->pesan)
                                <li>Pesan: {{ $history->pesan }}</li>
                                @endif
                            </ul>
                        </div>
                        <div class="col">
                            <h6>Status Donasi:</h6>
                            <span class="badge {{ $history->status == 'Sedang Berlangsung' ? 'bg-success' : 'bg-secondary' }}">{{ $history->status }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection