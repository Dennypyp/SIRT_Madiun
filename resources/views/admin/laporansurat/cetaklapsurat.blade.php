<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style >
    body{
        font-family: arial;
    }
    .print{
        margin-top: 10px;
    }
    @media print{
        .print{
            display: none;
        }
    }
    table{
        border-collapse: collapse;
    }
</style>
<body>
    <center>
		<h2>KECAMATAN TAMAN
			<br>
			KELURAHAN JOSENAN
			<br>
			RUKUN TETANGGA 03
		</h2>
	<br/>
	</center>
	<hr/>
    <br>
    <center>
    <h3>
        LAPORAN PENGAJUAN SURAT PENGANTAR
        <br>
        RT 03 RW 1 KELURAHAN JOSENAN 
        <br>
        BULAN {{ format_bln_kap($tanggal) }}
        <br>
    </h3>
    <br>
    <br>
    <table border="1" cellspacing="" cellpadding="4" width="100%">
        <tr>
        <th align="center">No</th>
        <th align="center">Nama</th>
        <th align="center">Keperluan</th>
        </tr>
        
        @foreach($surat as $key)
            <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $key->nama }}</td>
            <td align="center">{{ $key->keperluan }}</td>
            </tr>
            @endforeach
        <tr>
        <td align="center" colspan="2"><b>Total Pengajuan Surat Pengantar</b></td>
        <td align="center">{{ $total }}</td>
        </tr>



    </table>
</center>
    <p style="text-indent: 50px;">Demikian Laporan Pengajuan Surat Pengantar Bulan Ini Pada RT. 3 RW. 1 Kelurahan Josenan Kecamtan Taman Kota Madiun.</p>
    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <br/>
                    <center>
                    <p>Madiun, {{ format_tgl(date('Y-m-d')) }} <br/>
                        Ketua RT.03,
                    </center>

                <br/>
                <br/>
                <br/>
                <center>
                    <p>
                        <u>
                            Muhamad Bisri
                        </u>
                    </p>
                </center>
            </td>
        </tr>
    </table>

</body>
</html>
