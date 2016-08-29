<div class="table-responsive">
    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Tgl</th>
                <th>Bulan</th>
                <th style="width:60px;">Tahun</th>
                <th>Donatur</th>
                <th>Jenis</th>
                <th>Keterangan</th>
                <th>Alokasi</th>
                <th class="text-right">Jumlah</th>
            </tr>
            {!! Form::open(['method' => 'GET']) !!}
            <tr>
                <td>
                    <!-- {!! Form::text('tanggal', request('tanggal'), ['class' => 'form-control', 'placeholder' => 'Tanggal']) !!} -->
                </td>
                <td>
                    {!! Form::select('bulan', [
                    '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
                    '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
                    '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember',
                    ], request('bulan'), ['class' => 'form-control', 'placeholder' => '-Bulan-']) !!}
                </td>
                <td>
                    {!! Form::text('tahun', request('tahun'), ['class' => 'form-control', 'placeholder' => 'Thn']) !!}
                </td>
                <td>
                    {!! Form::text('donatur', request('donatur'), ['class' => 'form-control', 'placeholder' => 'Donatur']) !!}
                </td>
                <td>
                    {!! Form::select('jenis', App\Donasi::getJenisList(), request('jenis'), ['class' => 'form-control', 'placeholder' => '-Jenis-']) !!}
                </td>
                <td>
                    {!! Form::text('keterangan', request('keterangan'), ['class' => 'form-control', 'placeholder' => 'Keterangan']) !!}
                </td>
                <td>
                    {!! Form::text('alokasi', request('alokasi'), ['class' => 'form-control', 'placeholder' => 'Alokasi']) !!}
                </td>
                <td class="text-right" style="width:90px;">
                    <button type="submit" name="filter" class="btn btn-default"><i class="fa fa-filter"></i></button>
                    <a href="/donasi" class="btn btn-default"><i class="fa fa-refresh"></i></a>
                </td>
            </tr>
            {!! Form::close() !!}
        </thead>
        <tbody>
            <?php $total = 0; $zakat = 0; $sedekah = 0; $qurban = 0; ?>
            @foreach ($donasis as $s)
            <?php
            $total += $s->jumlah;

            if ($s->jenis == 'zakat') {
                $zakat += $s->jumlah;
            }

            if ($s->jenis == 'sedekah') {
                $sedekah += $s->jumlah;
            }

            if ($s->jenis == 'qurban') {
                $qurban += $s->jumlah;
            }
            ?>
            <tr>
                <td>{{ date('d', strtotime($s->tanggal)) }}</td>
                <td>{{ date('F', strtotime($s->tanggal)) }}</td>
                <td>{{ date('Y', strtotime($s->tanggal)) }}</td>
                <td>{{ $s->donatur }}</td>
                <td>{{ $s->jenis }}</td>
                <td>{{ $s->keterangan }}</td>
                <td>{{ $s->alokasi }}</td>
                <td class="text-right">{{ number_format($s->jumlah, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr style="font-size:20px;">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th class="text-right">Total:</th>
                <th class="text-right">{{ number_format($total, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>
</div>


@push('script')
    <script type="text/javascript">
    $('#chart').highcharts({
           chart: {
               plotBackgroundColor: null,
               plotBorderWidth: null,
               plotShadow: false,
               type: 'pie'
           },
           title: {
               text: 'DONASI BERDASARKAN JENIS'
           },
           tooltip: {
               pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
           },
           plotOptions: {
               pie: {
                   allowPointSelect: true,
                   cursor: 'pointer',
                   dataLabels: {
                       enabled: true,
                       format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                       style: {
                           color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                       }
                   }
               }
           },
           series: [{
               name: 'Jenis',
               colorByPoint: true,
               data: [{
                   name: 'Zakat',
                   y: {{ $zakat }}
               }, {
                   name: 'Sedekah',
                   y: {{ $sedekah }},
               }, {
                   name: 'Qurban',
                   y: {{ $qurban }},
                //    sliced: true,
                //    selected: true
               }]
           }]
       });

       $('#chartPerMonth').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'DONASI PER BULAN'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' IDR'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Year 1800',
                data: [107, 31, 635, 203, 2]
            }, {
                name: 'Year 1900',
                data: [133, 156, 947, 408, 6]
            }, {
                name: 'Year 2012',
                data: [1052, 954, 4250, 740, 38]
            }]
        });
    </script>
@endpush
