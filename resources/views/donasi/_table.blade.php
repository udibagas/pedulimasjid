<table class="table table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Donatur</th>
            <th>Jenis</th>
            <th>Jumlah</th>
        </tr>
        {!! Form::open(['method' => 'GET']) !!}
        <tr>
            <td>
                {!! Form::text('tanggal', request('tanggal'), ['class' => 'form-control', 'placeholder' => 'Tanggal']) !!}
            </td>
            <td>
                {!! Form::select('bulan', [
                    '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
                    '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
                    '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember',
                ], request('bulan'), ['class' => 'form-control', 'placeholder' => '-- Bulan --']) !!}
            </td>
            <td>
                {!! Form::text('tahun', request('tahun'), ['class' => 'form-control', 'placeholder' => 'Tahun']) !!}
            </td>
            <td>
                {!! Form::text('donatur', request('donatur'), ['class' => 'form-control', 'placeholder' => 'Donatur']) !!}
            </td>
            <td>
                {!! Form::select('jenis', ['sedekah' => 'Sedekah', 'zakat' => 'Zakat'], request('jenis'), ['class' => 'form-control', 'placeholder' => '-- Jenis --']) !!}
            </td>
            <td class="text-right" style="width:90px;">
                <button type="submit" name="filter" class="btn btn-default"><i class="fa fa-filter"></i></button>
                <a href="/donasi" class="btn btn-default"><i class="fa fa-refresh"></i></a>
            </td>
        </tr>
        {!! Form::close() !!}
    </thead>
    <tbody>
        <?php $total = 0; $zakat = 0; $sedekah = 0; ?>
        @foreach ($donasis as $s)
        <?php
            $total += $s->jumlah;

            if ($s->jenis == 'zakat') {
                $zakat += $s->jumlah;
            }

            if ($s->jenis == 'sedekah') {
                $sedekah += $s->jumlah;
            }
        ?>
        <tr>
            <td>{{ date('d', strtotime($s->tanggal)) }}</td>
            <td>{{ date('F', strtotime($s->tanggal)) }}</td>
            <td>{{ date('Y', strtotime($s->tanggal)) }}</td>
            <td>{{ $s->donatur }}</td>
            <td>{{ $s->jenis }}</td>
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
            <th class="text-right">Total:</th>
            <th class="text-right">{{ number_format($total, 0, ',', '.') }}</th>
        </tr>
    </tfoot>
</table>

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
                //    sliced: true,
                //    selected: true
               }]
           }]
       });
    </script>
@endpush
