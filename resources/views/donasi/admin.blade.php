@extends('layouts.backend')

@section('content')

    <div class="pull-right">
        <br>
        <a href="/donasi/create" class="btn btn-info"><i class="fa fa-plus"></i> ADD DONASI</a>
    </div>

    <h3>MANAGE DONASI</h3>
    <hr>

    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>Tgl</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Pengirim</th>
                <th>Penerima</th>
                <th>Donatur</th>
                <th>Jenis</th>
                <th>Keterangan</th>
                <th>Alokasi</th>
                <th>Jumlah</th>
                <th style="width:90px;">Action</th>
            </tr>
            {!! Form::open(['method' => 'GET']) !!}
            <tr>
                <td>
                    {!! Form::text('tanggal', request('tanggal'), ['class' => 'form-control', 'placeholder' => 'Tgl']) !!}
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
                    {!! Form::text('pengirim', request('pengirim'), ['class' => 'form-control', 'placeholder' => 'Pengirim']) !!}
                </td>
                <td>
                    {!! Form::text('penerima', request('penerima'), ['class' => 'form-control', 'placeholder' => 'Penerima']) !!}
                </td>
                <td>
                    {!! Form::text('donatur', request('donatur'), ['class' => 'form-control', 'placeholder' => 'Donatur']) !!}
                </td>
                <td>
                    {!! Form::select('jenis', App\Donasi::getJenisList(), request('jenis'), ['class' => 'form-control', 'placeholder' => '-- Jenis --']) !!}
                </td>
                <td>
                    {!! Form::text('keterangan', request('keterangan'), ['class' => 'form-control', 'placeholder' => 'Keterangan']) !!}
                </td>
                <td>
                    {!! Form::text('alokasi', request('alokasi'), ['class' => 'form-control', 'placeholder' => 'Alokasi']) !!}
                </td>
                <td>
                    {!! Form::text('jumlah', request('jumlah'), ['class' => 'form-control', 'placeholder' => 'Jumlah']) !!}
                </td>
                <td class="text-right">
                    <button type="submit" name="filter" class="btn btn-default" value="filter"><i class="fa fa-filter"></i></button>
                    <a href="/donasi/admin" class="btn btn-default"><i class="fa fa-refresh"></i></a>
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
            <tr class="@if (!$s->confirmed) danger @endif">
                <td>{{ date('d', strtotime($s->tanggal)) }}</td>
                <td>{{ date('F', strtotime($s->tanggal)) }}</td>
                <td>{{ date('Y', strtotime($s->tanggal)) }}</td>
                <td>
                    {{ $s->pengirim }}<br>
                    {{ $s->bank_pengirim }}<br>
                    {{ $s->rekening_pengirim }}
                </td>
                <td>
                    {{ $s->penerima }}<br>
                    {{ $s->bank_penerima }}<br>
                    {{ $s->rekening_penerima }}
                </td>
                <td>{{ $s->donatur }}</td>
                <td>{{ $s->jenis }}</td>
                <td>{{ $s->keterangan }}</td>
                <td>{{ $s->alokasi }}</td>
                <td class="text-right">{{ number_format($s->jumlah, 0, ',', '.') }}</td>
                <td class="text-right">
                    {!! Form::open(['method' => 'DELETE', 'url' => '/donasi/'.$s->id]) !!}

                        @if ($s->confirmed)
                            <a href="/donasi/{{ $s->id }}/unconfirm" class="btn btn-default btn-xs confirm" title="Unconfirm"><i class="fa fa-remove"></i></a>
                        @else
                            <a href="/donasi/{{ $s->id }}/confirm" class="btn btn-default btn-xs confirm" title="Confirm"><i class="fa fa-check"></i></a>
                        @endif

                        <a href="/donasi/{{ $s->id }}/edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
                        <button type="submit" name="submit" class="confirm btn btn-default btn-xs"><i class="fa fa-trash"></i></button>
                    {!! Form::close() !!}
                </td>
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
                <td></td>
            </tr>
        </tfoot>
    </table>

@endsection
