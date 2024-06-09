@extends('layouts.master')

@section('content')
    <div class="w-full">
        @foreach ($request as $d)
            <div class="mt-6 flex overflow-hidden bg-white px-6 py-4 shadow-md sm:rounded-lg">
                <div class="flex flex-1 items-center justify-center">
                    @unless ($d->MoneyDonation->Donation->Campaign->foto_campaign === null)
                        <img class="rounded-lg" src="{{ $d->MoneyDonation->Donation->Campaign->foto_campaign }}"
                            alt="{{ $d->MoneyDonation->Donation->Campaign->nama_campaign }}" style="background-image: cover">
                    @else
                        <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable" alt="No Image"
                            style="background-image: cover">
                    @endunless
                </div>
                <div class="ml-2 flex flex-1 flex-col justify-center">
                    <h1>Nama Campaign</h1>
                    <h1>{{ $d->MoneyDonation->Donation->Campaign->nama_campaign }}</h1>
                </div>
                <div class="flex flex-1 flex-col items-center justify-center">
                    <h3>Donasi Terkumpul</h3>
                    <h3>Rp. {{ number_format($d->nominal_terkumpul, 0, ',', '.') }}</h3>
                </div>
                <div class="flex flex-1 flex-col items-center justify-center">
                    <h3>Kuota Pencairan</h3>
                    <h3>Rp.
                        @if (is_null($d->id_tahap_pencairan))
                            {{ number_format($d->nominal_terkumpul, 0, ',', '.') }}
                        @else
                            {{ number_format($d->nominal_sisa, 0, ',', '.') }}
                        @endif
                    </h3>
                </div>
                <div class="flex flex-1 items-center justify-center">
                    @if ($d->status==='pending' || $d->id_tahap_pencairan===NULL)
                        <button class="rounded bg-gray-500 px-4 py-2 font-bold text-white disabled" disabled >Pending</button>
                    @elseif ($d->id_tahap_pencairan===2 && $d->MoneyDonation->Donation->Campaign->status != 'selesai')
                        <button class="rounded bg-gray-500 px-4 py-2 font-bold text-white disabled" disabled >Tunggu Campaign Selesai</button>
                    @else
                        <a href="{{ route('pencairan.request', $d->id) }}"
                            class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">Cairkan
                            Dana</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
