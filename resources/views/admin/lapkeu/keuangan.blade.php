<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Keungan Bulanan</title>
</head>
<style>
    body {
        font-family: arial;
    }

    .print {
        margin-top: 10px;
    }

    @media print {
        .print {
            display: none;
        }
    }

    table {
        border-collapse: collapse;
    }

</style>

<body>
    <center>
        <h3>
            RT 03/RW 01
            <br>
            KECAMATAN TAMAN
            <br>
            KELURAHAN JOSENAN
            <br>
            <br>
            REKAP LAPORAN KEUANGAN
            <br>
            BULAN {{ format_bln_kap($tanggal) }}
        </h3>
        <br />
    </center>
    <hr />
    {{-- =============================================================== --}}
    <br />
    <br>
    {{-- Transaksi --}}
    @foreach ($transaksi as $jenis_transaksi => $uang)
        @php
            $tottrans['Pemasukan'] = 0;
            $tottrans['Pengeluaran'] = 0;
        @endphp
        <h4>• {{ $jenis_transaksi }}</h4>
        <table border="1" cellspacing="" cellpadding="4" width="100%">
            <thead>
                <tr>
                    <th align="center" rowspan="2">No</th>
                    <th align="center" rowspan="2">Tanggal</th>
                    <th align="center" rowspan="2">Keterangan</th>
                    <th align="center" colspan="2">Status</th>
                </tr>
                <tr>
                    <th align="center">Pemasukan</th>
                    <th align="center">Pengeluaran</th>
                </tr>
            </thead>
            @foreach ($uang as $item)
                <tbody>
                    <tr>
                        <td align="center">{{ $loop->iteration }}</td>
                        <td align="center">{{ format_tgl($item->tanggal_transaksi) }}</td>
                        <td align="center">{{ $item->keterangan_transaksi }}</td>
                        @if ($item->status_transaksi == 'Pemasukan')
                            <td align="center">{{ format_rp($item->jumlah_transaksi) }}</td>
                            <td align="center">-</td>
                        @elseif($item->status_transaksi=='Pengeluaran')
                            <td align="center">-</td>
                            <td align="center">{{ format_rp($item->jumlah_transaksi) }}</td>

                        @endif
                    </tr>

                </tbody>
                @php
                    if ($item->status_transaksi == 'Pemasukan') {
                        $tottrans['Pemasukan'] = $tottrans['Pemasukan'] + $item->jumlah_transaksi;
                    }
                    
                    if ($item->status_transaksi == 'Pengeluaran') {
                        $tottrans['Pengeluaran'] = $tottrans['Pengeluaran'] + $item->jumlah_transaksi;
                    }
                @endphp
            @endforeach
            <tr>
                <td colspan="3" align="center">TOTAL</td>
                <td align="center"><b>{{ format_rp($tottrans['Pemasukan']) }}</b></td>
                <td align="center"><b>{{ format_rp($tottrans['Pengeluaran']) }}</b></td>
            </tr>

        </table>
    @endforeach
    {{-- End Transaksi --}}
    {{-- Jimpitan --}}
    <h4>• Jimpitan</h4>
    <table border="1" cellspacing="" cellpadding="4" width="100%">
        <tr>
            <th align="center">No</th>
            <th align="center">Nama Warga</th>
            <th align="center">Jumlah</th>
        </tr>
        @foreach ($jimpitan as $item)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $item->nama }}</td>
                <td align="center">{{ format_rp($item->jumlah_jimpitan) }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2" align="center">TOTAL</td>
            <td align="center"><b>{{ format_rp($total) }}</b></td>
        </tr>
    </table>
    {{-- End Jimpitan --}}
    {{-- Neraca --}}
    <h4>• Neraca</h4>
    {{-- End Neraca --}}
    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <br />
                <center>
                    <p>Madiun, {{ format_tgl(date('Y-m-d')) }} <br />
                        Ketua RT. 03,
                </center>

                <br />
                <br />
                <br />
                <center>
                    <p>Muhammad Bisri</p>
                </center>
                <p style="margin-top: -30px">__________________________</p>
            </td>
        </tr>
    </table>

</body>

</html>
