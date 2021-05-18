<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'Times New Roman';
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
        <h3>DAFTAR WARGA RT 03 RW 01
            <br>
            KELURAHAN JOSENAN KEC. TAMAN KOTA MADIUN
            <br>
            TAHUN {{ date('Y') }}
        </h3>
    </center>
    {{--  <hr />
    <br>  --}}
    <center>
        {{--  <h3>
            DATA WARGA
            <br>
            RT 03 RW 1 KELURAHAN JOSENAN
            <br>
        </h3>
        <br>  --}}
        <table border="1" cellspacing="" cellpadding="4" width="100%">
            <tr>
                <th align="center">No.</th>
                <th align="center">NIK</th>
                <th align="center">Nama</th>
                <th align="center">No. KK</th>
                <th align="center">Tempat, Tanggal Lahir</th>
                <th align="center">Jenis Kelamin</th>
                <th align="center">Pendidikan</th>
                <th align="center">Agama</th>
                <th align="center">Pekerjaan</th>
                <th align="center">Alamat</th>
                <th align="center">Nama Ibu/Bapak</th>
            </tr>
            @foreach ($anggota as $data)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td align="center">{{ $data->nik }}</td>
                    <td align="center">{{ $data->nama }}</td>
                    <td align="center">{{ $data->no_kk }}</td>
                    <td align="center">{{ $data->tempat_lahir }}, {{ format_tgl($data->tanggal_lahir) }}</td>
                    <td align="center">{{ $data->jenis_kelamin }}</td>
                    <td align="center">{{ $data->pendidikan }}</td>
                    <td align="center">{{ $data->agama }}</td>
                    <td align="center">{{ $data->pekerjaan }}</td>
                    <td align="center">{{ $data->alamat }}</td>
                    <td align="center">{{ $data->nama_ibu_bapak }}</td>
                </tr>
            @endforeach
        </table>
    </center>
    <br>
    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <br />
                <center>
                    <p>Madiun, {{ format_tgl(date('Y-m-d')) }} <br />
                        Ketua RT.03,
                </center>
                <br />
                <br />
                <br />
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
