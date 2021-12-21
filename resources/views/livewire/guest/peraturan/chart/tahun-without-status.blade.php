<div>
    <x-default-card>
        <x-slot name="title">
            {{__('REKAP PRODUK HUKUM PERTAHUN')}}
        </x-slot>
        <x-slot name="icon">
            <x-heroicon-o-chart-bar class="flex-none w-16 h-7 w-7"/>
        </x-slot>
        <x-slot name="content">
            <div class="p-3">
                <div id="chart-tahun-without-status" class="w-full overflow-scroll z-0 relative">
                </div>
            </div>
        </x-slot>
    </x-default-card>

    <script>

        Highcharts.chart('chart-tahun-without-status', {
            chart: {
                spacingBottom: 15,
                spacingTop: 10,
                spacingLeft: -20,
                spacingRight: 10,
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 15,
                    viewDistance: 25,
                    depth: 40
                }
            },
            title: {
                text: '  '
            },
            subtitle: {
                text: '  '
            },
            xAxis: {
                categories: {!! $dataCategory !!},
                tickmarkPlacement: 'on',
                title: {
                    enabled: false
                },
                labels: {
                    skew3d: true,
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Jumlah Peraturan Pertahun',
                    skew3d: true
                }
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b>',
                pointFormat: '{point.name} : {point.y}',
                valueSuffix: ' Produk Hukum'
            },
            plotOptions: {
                variablepie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>'
                    }
                }
            },
            series: [{
                colorByPoint: true,
                minPointSize: 10,
                innerSize: '15%',
                zMin: 0,
                name: '',
                showInLegend: false,
                data: {!! $dataBar !!}
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
                filename: 'Grafik Peraturan [Pertahun]'
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
