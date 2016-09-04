<div class="media" style="height:120px;">
    <div class="media-left">
        <div  style="width:100px;height:100px;">
            <a href="/masjid/{{ $m->id }}-{{ str_slug($m->nama) }}">
                <img class="media-object cover" src="/{{ $m->img }}" alt="{{ $m->nama }}" />
            </a>
        </div>
    </div>
    <div class="media-body">
        <a href="/masjid/{{ $m->id }}-{{ str_slug($m->nama) }}">
            <h4 style="margin:0;">{{ $m->nama }}</h4>
        </a>
        <p>
            {{ $m->alamat }}, Kelurahan {{ $m->kelurahan ? $m->kelurahan->nama : '-' }}, Kecamatan {{ $m->kecamatan ? $m->kecamatan->nama : '-' }}, {{ $m->kota ? $m->kota->nama : '-' }}, Provinsi {{ $m->provinsi ? $m->provinsi->nama : '-' }}, Kode Pos : {{ $m->kode_pos or '-' }}
        </p>
    </div>
</div>
