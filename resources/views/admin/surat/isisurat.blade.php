<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pengantar</title>
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
        SURAT PENGANTAR
        <br>
        NO: 0{{$no}}/03/{{ format_bln_roma(date('Y-m-d')) }}/{{date('Y')}}
    </h3>
    {{-- <h3></h3> --}}
    </center>
	<br>
	<p>Yang bertanda tangan dibawah ini Ketua RT.03 RW.01 Kelurahan Josenan, Kecamatan Taman, Kota Madiun, dengan ini menerangkan bahwa:</p>
	<br>
	<table border="0" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<td>Nama</td>
        <td>:</td>
        <td>{{$surat->nama}}</td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td>{{$surat->nik}}</td>
    </tr>
    <tr>
       <td>Tempat/Tgl.Lahir</td>
       <td>:</td>
       <td>{{$surat->tempat_lahir}} / {{format_tgl($surat->tanggal_lahir)}}</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{$surat->jenis_kelamin}}</td>
    </tr> 
    <tr>
        <td>Status</td>
        <td>:</td>
        <td>{{$surat->status}}</td>
    </tr>    
    <tr>
        <td>Agama</td>
        <td>:</td>
        <td>{{$surat->agama}}</td>
    </tr>    
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>{{$surat->pekerjaan}}</td>
    </tr>    
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{$surat->alamat}}</td>
    </tr>    
    <tr>    
        <td>Keperluan</td>
        <td>:</td>
        <td>{{$surat->keperluan}}</td>
	</tr>
    <tr>
        <td>Catatan</td>
        <td>:</td>
        <td>Pada waktu pengurusan surat ke Kelurahan, diharap membawa KTP dan KK yang asli</td>
    </tr>
	</table>
    <p>Demikian Surat Pengantar ini dibuat untuk dipergunakan sebagaimana mestinya</p>
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