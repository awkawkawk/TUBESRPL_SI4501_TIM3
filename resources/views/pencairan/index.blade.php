@extends('layouts.master')

@section('content')
    <div class="w-full">
        @foreach ($request as $d)
            <div class="flex mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex-1 flex justify-center items-center">
                    @unless ($d->MoneyDonation->Donation->Campaign->foto_campaign === null)
                        <img src="{{ asset('storage/cover_images/' . $d->MoneyDonation->Donation->Campaign->foto_campaign) }}"
                            alt="{{ $d->MoneyDonation->Donation->Campaign->nama_campaign }}" style="background-image: cover">
                    @else
                        <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable" alt="No Image"
                            style="background-image: cover">
                    @endunless
                </div>
                <div class="flex-1 flex flex-col justify-center ml-2">
                    <h1>Nama Campaign</h1>
                    <h1>{{ $d->MoneyDonation->Donation->Campaign->nama_campaign }}</h1>
                </div>
                <div class="flex-1 flex flex-col justify-center items-center">
                    <h3>Donasi Terkumpul</h3>
                    <h3>Rp.  {{ number_format($d->nominal_terkumpul, 0, ',', '.') }}</h3>
                </div>
                <div class="flex-1 flex flex-col justify-center items-center">
                    <h3>Sisa Donasi</h3>
                    <h3>Rp.
                        @if (is_null($d->id_tahap_pencairan))
                        {{ number_format($d->nominal_terkumpul, 0, ',', '.') }}
                        @else
                        {{ number_format($d->nominal_sisa, 0, ',', '.') }}
                        @endif
                    </h3>
                </div>
                <div class="flex-1 flex justify-center items-center">
                    <a href="{{ route('pencairan.request', $d->id) }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cairkan
                        Dana</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
