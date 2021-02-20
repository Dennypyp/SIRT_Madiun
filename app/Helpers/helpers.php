<?php 

function format_no($number)
{
    return number_format($number, 0, ',', '.');
}

function format_rp($number)
{
    if ($number == 0) {
        return 0;
    }

    return 'Rp'.format_no($number);
}


function format_tgl($tgl){
    $bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tgl);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    // $tanggal=strtotime($tgl);
    // $date=date("d F Y",$tanggal);
    // return $date;
}
?>