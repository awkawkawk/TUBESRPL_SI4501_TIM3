@php
    $totalCampaign = array_sum($campaignChartData);
@endphp

<div class="col-span-4 sm:col-span-4 md:col-span-6 lg:col-span-4 xl:col-span-4">
    {{-- <div class="w-full relative mb-4"> --}}
        <div class="flex-auto p-4 bg-white">
            <p class="mb-1 text-slate-700 dark:text-slate-400 text-l">Total Campaign</p>
            <div class="border-b border-dashed border-slate-300 dark:border-slate-700/40 my-3"></div>
            <div class="flex gap-4 mb-8">
                <div class="col-span-1 sm:col-span-6">
                    <div id="total_campaign" class="apex-charts -mb-4"></div>
                </div><!--end col-->
                <div class="flex-1 self-center">
                    <ol class="list-none list-inside mb-3">
                        <li class="mb-1 text-slate-700 dark:text-slate-400 text-m">
                            {{ $totalCampaign }} Campaign
                        </li>
                        <li class="mb-1 text-slate-700 dark:text-slate-400 text-sm">
                            <i class="icofont-ui-play me-2" style="color: #d9e6fd;"></i> Berlangsung
                        </li>
                        <li class="mb-1 text-slate-700 dark:text-slate-400 text-sm">
                            <i class="icofont-ui-play me-2" style="color: #4a8af6;"></i> Menunggu Verifikasi
                        </li>
                        <li class="mb-1 text-slate-700 dark:text-slate-400 text-sm">
                            <i class="icofont-ui-play me-2" style="color: #fbc659;"></i> Tertolak
                        </li>
                    </ol>

                </div><!--end col-->
            </div><!--end grid-->

        </div><!--end card-body-->
    {{-- </div><!--end card--> --}}
</div><!--end col-->
