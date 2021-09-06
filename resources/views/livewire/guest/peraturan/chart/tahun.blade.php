<div>
    <x-default-card>
        <x-slot name="title">
            {{__('STATISTIK PRODUK HUKUM')}}
        </x-slot>
        <x-slot name="icon">
            <x-heroicon-o-chart-bar class="flex-none w-16 h-7 w-7"/>
        </x-slot>
        <x-slot name="content">
            <div class="p-3">
                <div id="chart-tahun" class="w-full overflow-scroll">
                </div>
            </div>
        </x-slot>
    </x-default-card>

    <script>
        Highcharts.chart('chart-tahun', {

            chart: {
                type: 'column'
            },

            title: {
                text: ''
            },

            xAxis: {
                categories: {!! $dataCategory !!}
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Jumlah Peraturan Pertahun'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b> ' +
                        this.series.name + ': ' + this.y;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: {!! $dataBar !!}
        });

    </script>
</div>
