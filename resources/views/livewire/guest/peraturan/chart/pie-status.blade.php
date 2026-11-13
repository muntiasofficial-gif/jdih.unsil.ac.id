<div>
    <x-default-card>
        <x-slot name="title">
            {{__('REKAP PERATURAN PER-STATUS')}}
        </x-slot>
        <x-slot name="icon">
            <x-heroicon-o-chart-bar class="flex-none w-16 h-7 w-7"/>
        </x-slot>
        <x-slot name="content">
            <div class="p-3">
                <div id="pie-status" class="w-full overflow-scroll">
                </div>
                {{-- <div class="flex gap-2 mt-2">
                    <button
                        type="button"
                        onclick="downloadLokasiJPEG()"
                        class="px-3 py-2 bg-gray-200 rounded">
                        Unduh JPEG
                    </button>

                    <button
                        type="button"
                        onclick="downloadLokasiPDF()"
                        class="px-3 py-2 bg-gray-200 rounded">
                        Unduh PDF
                    </button>
                </div> --}}
            </div>
        </x-slot>
    </x-default-card>

    {{-- Do your work, then step back. --}}
    <script>


        Highcharts.chart('pie-status', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
                
            },
            title: {
                text: '  '
            },
            tooltip: {
                pointFormat: '<b>{point.y} Produk Hukum</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    size: '50%',
                    dataLabels: {
                        enabled: true
                    }
                }
            },

             colors: ['#2F5597', '#5B9BD5', '#70Ad47'],

            series: [{
                name: 'PRODUK HUKUM',
                colorByPoint: true,
                data: {!! $dataPie !!}
            }],
            lang: {
                downloadJPEG: 'Unduh file JPEG',
                downloadPDF: 'Unduh file PDF',
                downloadXLS: 'Unduh file Excel'
            },
            exporting: {
                buttons: {
                    contextButton: {
                        menuItems: ['downloadJPEG', 'downloadPDF', 'separator', 'downloadXLS']
                    }
                },
                filename: 'Grafik Peraturan Per-status'
            },
            navigation: {
                buttonOptions: {
                    verticalAlign: 'top',
                    y: -5
                }
            }

        });
    </script>
</div>
