<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Dana Sosial (Jimpitan)</title>
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
		<h3>RT 03/RW 01
			<br>
			REKAP DANA SOSIAL (JIMPITAN)
			<br>
			BULAN {{ format_bln_kap($tanggal) }}
		</h3>
	<br/>
	</center>
	<hr/>
	{{-- Tanggal  --}}
	{{-- {{ format_tgl(date($tanggal)) }} --}}
	<br/>
	<br>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th align="center">No</th>
		<th align="center">Nama Warga</th>
        <th align="center">Jumlah</th>
	</tr>
        @foreach($jimpitan as $item)
        <tr>
		<td align="center">{{ $loop->iteration }}</td>
		<td align="center">{{ $item->nama }}</td>
		<td align="center">{{ format_rp($item->jumlah) }}</td>
        </tr>
		@endforeach


	<tr>
		<td colspan="2" align="center">TOTAL</td>
		<td align="center"><b>{{ format_rp($total) }}</b></td>
	</tr>
	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<br/>
				<center>
				<p>Madiun, {{ format_tgl(date('Y-m-d')) }} <br/>
					Ketua RT,
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