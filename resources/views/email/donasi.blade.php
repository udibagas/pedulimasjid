Konfirmasi donasi baru dari {{ $donasi->donatur }}. Silakan klik link berikut untuk verifikasi.

<br>
<br>

<a href="http://www.salwapedulimasj.id/donasi/admin">http://www.salwapedulimasj.id/donasi/admin</a>

<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Pengirim</th>
            <th>Penerima</th>
            <th>Donatur</th>
            <th>Jenis</th>
            <th>Keterangan</th>
            <th>Alokasi</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ date('d-m-Y', strtotime($s->tanggal)) }}</td>
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
            <td>{{ number_format($s->jumlah, 0, ',', '.') }}</td>
        </tr>
    </tbody>
</table>
