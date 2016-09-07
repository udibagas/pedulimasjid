<h3>PENDAFTARAN MASID BARU</h3>

Berikut data masjid yang telah di daftarkan. Silakan klik link berikut untuk approval.

<br><br>

<a href="http://www.pedulimasj.id/masjid/admin">http://www.pedulimasj.id/masjid/admin</a>

<br><br>

<table>
    <tbody>
        <tr>
            <td class="td-label">Nama Masjid :</td>
            <td>{{ $masjid->nama }}</td>
        </tr>
        <tr>
            <td class="td-label">Alamat :</td>
            <td>
                {{ $masjid->alamat }}, Kelurahan {{ $masjid->kelurahan ? $masjid->kelurahan->nama : '-' }}, Kecamatan {{ $masjid->kecamatan ? $masjid->kecamatan->nama : '-' }}, {{ $masjid->kota ? $masjid->kota->nama : '-' }}, Provinsi {{ $masjid->provinsi ? $masjid->provinsi->nama : '-' }}, Kode Pos {{ $masjid->kode_pos or '-' }}
            </td>
        </tr>
        <tr>
            <td class="td-label">Lat/Long :</td>
            <td>
                <a href="https://www.google.co.id/maps/{{ '@'.$masjid->lat }},{{ $masjid->long }},15.75z?hl=en" title="Lihat di Google Map" target="_blank">
                    {{ $masjid->lat }}/{{ $masjid->long }}
                </a>
            </td>
        </tr>
        <tr>
            <td class="td-label">Contact Person :</td>
            <td>{{ $masjid->kontak_nama }} - {{ $masjid->kontak_telp }}</td>
        </tr>
        <tr>
            <td class="td-label">Kondisi Saat Ini :</td>
            <td>{!! nl2br($masjid->kondisi) !!}</td>
        </tr>
        <tr>
            <td class="td-label">Kegiatan Rutin :</td>
            <td>{!! nl2br($masjid->kegiatan) !!}</td>
        </tr>
        <tr>
            <td class="td-label">Kebutuhan Utama :</td>
            <td>{!! nl2br($masjid->kebutuhan) !!}</td>
        </tr>
    </tbody>
</table>
