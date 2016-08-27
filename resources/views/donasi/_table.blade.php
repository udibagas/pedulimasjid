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
        <?php $total = 0; ?>
        @foreach ($donasis as $s)
        <?php $total += $s->jumlah ?>
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