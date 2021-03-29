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
        DAFTAR USULAN KEGIATAN FISIK
        <br>
        RT 03 RW 1 KELURAHAN JOSENAN TAHUN {{date('Y')}}
        <br>
    </h3>
    <br>
    <br>
    <table border="1" cellspacing="" cellpadding="4" width="100%">
        <tr>
            <th align="center">No</th>
            <th align="center">Nik</th>
            <th align="center">Nama Kegiatan</th>
            <th align="center">Nama Pengusul</th>
            <th align="center">Alamat Pengusul</th>
            <th align="center">Volume Kegiatan</th>
            <th align="center">Satuan</th>
            <th align="center">Lokasi</th>
            <th align="center">Status</th>
            <th align="center">Jumlah Dana</th>
            <th align="center">Keterangan</th>

        </tr>

            <tr>
            <td align="center">1</td>
            <td align="center">{{ $kegiatan_fisik->nik }}</td>
            <td align="center">{{ $kegiatan_fisik->kegiatan }}</td>
            <td align="center">{{ $kegiatan_fisik->nama }}</td>
            <td align="center">{{ $kegiatan_fisik->alamat }}</td>
            <td align="center">{{ $kegiatan_fisik->volume}}</td>
            <td align="center">{{ $kegiatan_fisik->satuan }}</td>
            <td align="center">{{ $kegiatan_fisik->lokasi }}</td>
            <td align="center">{{ $kegiatan_fisik->statusk }}</td>
            <td align="center">{{ $kegiatan_fisik->dana }}</td>
            <td align="center">{{ $kegiatan_fisik->keterangan }}</td>
            </tr>




    </table>

    <p>Demikian Detail Kegiatan Fisik Pada RT 03 RW 1 KELURAHAN JOSENAN KECAMATAN TAMAN</p>
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
                    <p>Muhammad Bisri</p>
                </center>
            <p style="margin-top: -30px">__________________________</p>
            </td>
        </tr>
    </table>

</body>
</html>
