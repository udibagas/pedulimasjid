<table class="table table-hover table-bordered table-striped table-condensed">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                DONASI PER BULAN
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0; ?>
        @foreach ($perMonth as $s)
        <?php $total += $s->jumlah; ?>
        <tr>
            <td class="td-label">{{ ucfirst($s->bulan) }}</td>
            <td class="text-right">
                {{ number_format($s->jumlah, 0, ',', '.') }}
            </td>
        </tr>
        @endforeach
        <tr style="font-size:20px;">
            <td class="td-label text-right">Total:</td>
            <td class="text-right text-bold">
                {{ number_format($total, 0, ',', '.') }}
            </td>
        </tr>
    </tbody>
</table>
