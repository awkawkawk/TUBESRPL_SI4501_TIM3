@php
    $totalItem = array_sum($ItemChartData);
@endphp

<div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4">
    <div class="relative mb-4 w-full">
        <div class="flex-auto bg-white p-4">
            <p class="text-l mb-1 text-slate-700 dark:text-slate-400">Donasi Barang</p>
            <div class="my-3 border-b border-dashed border-slate-300 dark:border-slate-700/40"></div>
            <div class="mb-[3.25rem] flex gap-4">
                <div class="col-span-1 sm:col-span-6">
                    <div id="donasi_barang" class="apex-charts -mb-4"></div>
                </div><!--end col-->
                <div class="flex-1 self-center">
                    <ol class="mb-3 list-inside list-none">
                        <li class="text-sm mb-1 text-slate-700 dark:text-slate-400">
                            {{ $totalItem }} Donasi
                        </li>
                        <li class="mb-1 text-xs text-slate-700 dark:text-slate-400">
                            <i class="icofont-ui-play me-2" style="color: #d9e6fd;"></i> Dikirim
                        </li>
                        <li class="mb-8 text-xs text-slate-700 dark:text-slate-400">
                            <i class="icofont-ui-play me-2" style="color: #4a8af6;"></i>Diterima
                        </li>

                    </ol>

                </div><!--end col-->
            </div><!--end grid-->

        </div><!--end card-body-->
    </div><!--end card-->
</div><!--end col-->
