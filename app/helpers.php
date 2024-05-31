<?php
if (!function_exists('role')) {
    function role($role)
    {
        if ($role == 1) {
            return "Superadmin";
        }
        if ($role == 2) {
            return "Admin";
        }
        if ($role == 3){
            return "Kurir";
        }

    }
}

if (!function_exists('status_pengiriman')) {
    function status_pengiriman($status)
    {
        if ($status == 1) {
            return "SUB-ONPROSES";
        }
        if ($status == 2) {
            return "Delivery";
        }
        if ($status == 3){
            return "Diterima";
        }

    }
}

if (!function_exists('status_kapal_tiba')) {
    function status_kapal_tiba($date)
    {
        if ($date > date('Y-m-d')) {
            return '<span class="badge badge-warning" style="color:black">Belum Datang pada Tujuan</span>';
        } else {
            return '<span class="badge badge-primary">Telah Datang pada Tujuan</span>';
        }

    }
}

if (!function_exists('kab_kot')){
    function kab_kot($kota)
    {
        $kota = strtolower(str_replace(["KABUPATEN", "KOTA"], '', $kota));
        $kota = ucwords($kota);
        return $kota;
    }
}

if (!function_exists('status')){
    function status($status)
    {
        if ($status == 0) {
            echo '<span class="badge bg-primary">AKTIF</span>';
        }
        if($status == 1) {
            echo'<span class="badge bg-danger">TIDAK AKTIF</span>';
        }

    }
}

if (!function_exists('status_payment')){
    function status_payment($status)
    {
        if ($status == 1) {
            echo '<span class="badge badge-primary">LUNAS</span>';
        }
        if($status == 2) {
            echo'<span class="badge badge-danger">BELUM LUNAS</span>';
        }

    }
}

if (!function_exists('verif')){
    function verif($status)
    {
        if ($status == 2) {
            echo '<span class="badge bg-success">Sudah di Publikasi</span>';
        }

        if ($status == 1) {
            echo '<span class="badge bg-primary">Menunggu Publikasi Admin</span>';
        }

        if($status == 0) {
            echo'<span class="badge bg-danger">Belum Terverifikasi OPD</span>';
        }

    }
}

if (!function_exists('status_blacklist')){
    function status_blacklist($status)
    {
        if ($status == "Block") {
            echo '<span class="badge bg-danger">Block</span>';
        }
        elseif($status == "Unblock") {
            echo'<span class="badge bg-success">Unblock</span>';
        }
    }
}

if (! function_exists('getListTahun'))
{
	function getListTahun()
	{
		$x = intval(date("Y"));
		$len = 3;
		$lang = 10;
		$tahun = [];

		for ($i=($x-$len); $i <= ($x+$lang); $i++) {
			$tahun[$i] = $i;
		}

		return $tahun;
	}
}
if (! function_exists('getListBulan'))
{
	function getListBulan()
	{
		$array_bulan = array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		return $array_bulan;
	}
}

if (! function_exists('removeLastString'))
{
	function removeLastString($string)
	{
		 return substr($string, 0, -1);
	}
}


if (! function_exists('dataVillage'))
{
	function dataVillage($village)
	{
		$string = "";
		 foreach ($village as $value) {
		 	$string .= $value->name.',';
		 }
		 return substr($string, 0, -1);
	}
}


if (! function_exists('dataRegencie'))
{
	function dataRegencie($regencie)
	{
		$string = "";
		 foreach ($regencie as $value) {
		 	$string .= $value->data_regencie->name.',';
		 }
		 return substr($string, 0, -1);
	}
}

if (! function_exists('dataProvince'))
{
	function dataProvince($province)
	{
		$string = "";
		 foreach ($province as $value) {
		 	$string .= $value->data_province->name.',';
		 }
		 return substr($string, 0, -1);
	}
}


if (! function_exists('dataDistrict'))
{
	function dataDistrict($district)
	{
		$string = "";
		 foreach ($district as $value) {
		 	$string .= $value->data_district->name.',';
		 }
		 return substr($string, 0, -1);
	}
}


if (! function_exists('statusForm'))
{
	function statusForm($parm)
	{
		if($parm == 0){
				return '<button class="border-0 btn-transition btn btn-secondary">
						<i aria-hidden="true" class="fa fa-fw" title="close"></i> Belum Konfirmasi
				</button>';
		}elseif ($parm == 1) {
			 return '<button class="border-0 btn-transition btn btn-success">
					 <i class="fa fa-check"> Sudah Konfirmasi</i>
			 </button>';
	 }elseif ($parm == 2) {
			 return '<button class="border-0 btn-transition btn btn-warning">
					 <i class="fa fa-fw" aria-hidden="true" title="Copy to use edit"></i> Revisi
			 </button>';
	 }else{
			 return "";
		}
	}
}

if (! function_exists('jenisPekerjaan'))
{
	function jenisPekerjaan($parm)
	{
		if($parm == 1){
				return "Pembuatan Baru";
	 }else {
			 return "Pengembangan";
		}
	}
}
if (! function_exists('typeDokumen'))
{
	function typeDokumen($parm)
	{
		if($parm == 1){
				return "Pengajuan";
	 }else {
			 return "Kelengkapan";
		}
	}
}

if (! function_exists('levelUser'))
{
	function levelUser($parm)
	{
		if($parm == "1"){
				return "Superadmin Kominfo";
		}elseif($parm == "2"){
			return "Verifikasi Kominfo";
		 }else {
				 return "Perangkat Daerah";
			}
	}
}

if (! function_exists('warnaLog'))
{
	function warnaLog($parm)
	{
		//danger, info
		if($parm == 1){
				return "badge-warning"; // Permintaan Revisi
		}elseif($parm == 2){
			return "badge-success"; //Konfirmasi
		}elseif($parm == 3){
			return "badge-dark"; //Perubahan
		}elseif($parm == 4){
			return "badge-primary"; //Pembuatan
		 }else {
				 return "badge-info";
			}
	}
}


if (! function_exists('resizer'))
{
	function resizer($fileName, $oldDir, $newDir)
	{
		$maxWidth = 600;
		$maxHeight = 600;
		$fixedWidth = 0;
		$fixedHeight = 0;
		$quality = 80;

		$file = $oldDir.'/'.$fileName;
		$fileDest = $newDir.'/'.$fileName;
		list($width, $height) = getimagesize($file);

		if($width >$maxWidth || $height>$maxHeight){
			if ( $fixedWidth ) {
			$newWidth  = $fixedWidth;
			$newHeight = ($newWidth / $width) * $height;

			} elseif ( $fixedHeight ) {
			$newHeight = $fixedHeight;
			$newWidth  = ($newHeight / $height) * $width;

			} elseif ( $width < $height ) {			// image is portrait
			$newHeight = $maxHeight;
			$newWidth  = ($newHeight / $height) * $width;

			} elseif ( $width > $height ) {			// image is landscape
			$newWidth  = $maxWidth;
			$newHeight = ($newWidth / $width) * $height;

			} else {								          	// image is square
			$newWidth  = $maxHeight;
			$newHeight = $maxHeight;
			}

		}else{
			$newWidth = $width;
			$newHeight = $height;

		}
		$extn = strtolower(pathinfo($file, PATHINFO_EXTENSION));

		// it's a jpeg
		if ( $extn == 'jpg' or $extn == 'jpeg' ) {
			$imageSrc = imagecreatefromjpeg($file);
			// rotate image if necessary
			$exif = getimagesize($file);
			if ( isset($exif['Orientation']) ) {
				switch ( $exif['Orientation'] ) {
					case 3:
						$imageSrc = imagerotate($imageSrc, 180, 0);
						break;
					case 6:
						$imageSrc = imagerotate($imageSrc, -90, 0);
						list($height, $width) = array($width, $height);
						list($newHeight, $newWidth) = array($newWidth, $newHeight);
						break;
					case 8:
						$imageSrc = imagerotate($imageSrc, 90, 0);
						list($height, $width) = array($width, $height);
						list($newHeight, $newWidth) = array($newWidth, $newHeight);
						break;
				}
			}
			$imageDest = imagecreatetruecolor($newWidth, $newHeight);
			if ( imagecopyresampled($imageDest, $imageSrc, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height) ) {
				imagejpeg($imageDest, $fileDest, $quality);
				imagedestroy($imageSrc);
				imagedestroy($imageDest);
				return true;
			}
			return false;
		}

		// it's a png
		if ( $extn == 'png' ) {
			$imageSrc  = imagecreatefrompng($file);
			$imageDest = imagecreatetruecolor($newWidth, $newHeight);
			imagealphablending($imageDest, false);
			imagesavealpha($imageDest, true);
			if ( imagecopyresampled($imageDest, $imageSrc, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height) ) {
				imagepng($imageDest, $fileDest, ($quality / 10) - 1);
				imagedestroy($imageSrc);
				imagedestroy($imageDest);
				return true;
			}
			return false;
		}
	}
}


if (! function_exists('nilaiRatingEmot'))
{
	function nilaiRatingEmot($status)
	{
		if($status == 1){
			$valueReview = -1;
		}elseif ($status == 2) {
			$valueReview = 1;
		}else{
			$valueReview = 2;
		}

		return $valueReview;
	}
}


if (! function_exists('getDays'))
{
	function getDays()
	{
		return [
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu',
			'Sun' => 'Minggu'
		];
	}
}

if (! function_exists('getMonths'))
{
	function getMonths()
	{
		return [
			1	=> "Januari",
			2	=> "Februari",
			3	=> "Maret",
			4	=> "April",
			5	=> "Mei",
			6	=> "Juni",
			7	=> "Juli",
			8	=> "Agustus",
			9	=> "September",
			10	=> "Oktober",
			11	=> "November",
			12	=> "Desember"
		];
	}
}



if (! function_exists('formatDatePhp'))
{
	function formatDatePhp($parm)
	{
		return date('Y-m-d', strtotime($parm));
	}
}

if (! function_exists('formatDateView'))
{
	function formatDateView($parm)
	{
		return date("m/d/Y", strtotime($parm));
	}
}


if (! function_exists('doubleToInt'))
{
	function doubleToInt($parm)
	{
		return number_format($parm, 0, '', '');
	}
}


if (! function_exists('formatNoRpComma'))
{
	function formatNoRpComma($parm)
	{
		return number_format($parm,2,",",".");
	}
}

if (! function_exists('strPadKode'))
{
	function strPadKode($parm)
	{
		return str_pad($parm,  2, "0", STR_PAD_LEFT);
	}
}

if (! function_exists('formatVolume'))
{
	function formatVolume($parm)
	{
		return round($parm,2);
	}
}

if (! function_exists('formatVolume'))
{
	function formatAnggaran($parm)
	{
		return round($parm,2);
	}
}

if (! function_exists('tglIndo'))
{
	function tglIndo($parm)
	{
		$array_bulan = array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$dataBulan = date('n',strtotime($parm));
		return date('d',strtotime($parm))." ".$array_bulan[$dataBulan]." ".date('Y',strtotime($parm));
	}
}

if (! function_exists('tglLblIndo'))
{
	function tglLblIndo($parm)
	{
		$array_bulan = array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$dataBulan = date('n',strtotime($parm));

		$dayList = array(
					'Sun' => 'Minggu',
					'Mon' => 'Senin',
					'Tue' => 'Selasa',
					'Wed' => 'Rabu',
					'Thu' => 'Kamis',
					'Fri' => 'Jumat',
					'Sat' => 'Sabtu'
				);
		$day = date('D',strtotime($parm));
		$tgl = date('d',strtotime($parm));
		$year = date('Y',strtotime($parm));

		$hari = $dayList[$day];
		$bulan = $array_bulan[$dataBulan];
		$tahun = terbilang($year);
		$tanggal = terbilang($tgl);
		return "$hari, tanggal $tanggal,bulan $bulan, tahun $tahun";
		// /Senin, tanggal Sepuluh, bulan Juli, tahun Dua Ribu Tujuh Belas
		// return date('d',strtotime($parm))." ".$array_bulan[$dataBulan]." ".date('Y',strtotime($parm));
	}
}

function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " Belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " Seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " Seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
	}
	return $temp;
}

function terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}
	return $hasil;
}

if (! function_exists('angkalTerbilang'))
{
	function angkalTerbilang($x) {
	  $angka = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
	  if ($x == 0)
	  	return "Nol";
	  elseif ($x < 12)
	    return " " . $angka[$x];
	  elseif ($x < 20)
	    return angkalTerbilang($x - 10) . " belas";
	  elseif ($x < 100)
	    return angkalTerbilang($x / 10) . " puluh" . angkalTerbilang($x % 10);
	  elseif ($x < 200)
	    return "seratus" . angkalTerbilang($x - 100);
	  elseif ($x < 1000)
	    return angkalTerbilang($x / 100) . " ratus" . angkalTerbilang($x % 100);
	  elseif ($x < 2000)
	    return "seribu" . angkalTerbilang($x - 1000);
	  elseif ($x < 1000000)
	    return angkalTerbilang($x / 1000) . " ribu" . angkalTerbilang($x % 1000);
	  elseif ($x < 1000000000)
	    return angkalTerbilang($x / 1000000) . " juta" . angkalTerbilang($x % 1000000);
	}
}
if (! function_exists('hariIndo'))
{
	function hariIndo($parm)
	{
		$day = date('D', strtotime($parm));
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
		return $dayList[$day];
	}
}

if (! function_exists('tglIndoAngka'))
{
	function tglIndoAngka($parm)
	{
		return date('d/m/Y',strtotime($parm));
	}
}

if (! function_exists('waktuIndo'))
{
	function waktuIndo($parm)
	{
		return date('H:i', strtotime($parm));
	}
}

if (! function_exists('tglWaktuIndo'))
{
	function tglWaktuIndo($parm)
	{
		if($parm == null){
			return "-";
		}
		if($parm == '0000-00-00 00:00:00'){
			return "-";
		}
		$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
		$dataBulan = date('n',strtotime($parm));
		$dataWaktu = date('H:i',strtotime($parm));
		return date('d',strtotime($parm))." ".$array_bulan[$dataBulan]." ".date('Y',strtotime($parm))." ".$dataWaktu." WIB";
	}
}

if (! function_exists('tglWaktuIndoAngka'))
{
	function tglWaktuIndoAngka($parm)
	{
		if($parm == '0000-00-00 00:00:00'){
			return "-";
		}
		$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
		$dataBulan = date('n',strtotime($parm));
		$dataWaktu = date('H:i',strtotime($parm));
		return date('d',strtotime($parm))."-".$dataBulan."-".date('Y',strtotime($parm))." ".$dataWaktu;
	}
}

if (! function_exists('hariTglWaktuIndo'))
{
	function hariTglWaktuIndo($parm)
	{
		if($parm == '0000-00-00 00:00:00'){
			return "-";
		}
		$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
		$dataBulan = date('n',strtotime($parm));

		$array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
		$dataHari = date('N',strtotime($parm));

		$dataWaktu = date('H:i',strtotime($parm));

		return $array_hari[$dataHari].", ".date('d',strtotime($parm))." ".$array_bulan[$dataBulan]." ".date('Y',strtotime($parm))." ".$dataWaktu;
	}
}

if (! function_exists('timeInterval'))
{
	function timeInterval($start, $end)
	{
		$date1=date_create($start);
		$date2=date_create($end);
		$diff=date_diff($date1,$date2);
		$jam=$diff->format('%h')+($diff->format('%a')*24);
		$menit=$diff->format('%i')+($diff->format('%a')*24);
		$detik=$diff->format('%s')+($diff->format('%a')*24);
		$time=['jam'=>$jam,'menit'=>$menit,'detik'=>$detik];
		return $time;
	}
}

if (! function_exists('timeInterval24'))
{
	function timeInterval24($start, $end)
	{
		$date1=date_create($start);
		$date2=date_create($end);
		$diff=date_diff($date1,$date2);
		$jam=$diff->format('%h')+($diff->format('%a')*24);
		$menit=$diff->format('%i')+($diff->format('%a')*24);
		$detik=$diff->format('%s')+($diff->format('%a')*24);
		$time=Date('H:i:s',strtotime($jam.':'.$menit.':'.$detik));
		return $time;
	}
}

if (! function_exists('dateDiff'))
{
	function dateDiff($parm)
	{
		$datetime1 = new DateTime();
		$datetime2 = new DateTime($parm);
		$interval = $datetime1->diff($datetime2);

		$year = $interval->format('%y');
		$month = $interval->format('%m');
		$day = $interval->format('%a');
		$hour = $interval->format('%h');
		$min = $interval->format('%i');

		$words = "";
		if($year > 0){
			$words .= $year;
			if($year == 1){
				$words .= " year ";
			}else{
				$words .= " years ";
			}
		}
		if($month > 0){
			$words .= $month;
			if($month == 1){
				$words .= " month ";
			}else{
				$words .= " months ";
			}
		}
		if($day > 0){
			$words .= $day;
			if($day == 1){
				$words .= " day ";
			}else{
				$words .= " days ";
			}
		}
		if($hour > 0){
			$words .= $hour;
			if($hour == 1){
				$words .= " hour ";
			}else{
				$words .= " hours ";
			}
		}
		if($min > 0){
			$words .= $min;
			if($min == 1){
				$words .= " min ";
			}else{
				$words .= " mins ";
			}
		}

		$con = $datetime1 > $datetime2 ? " ago" : " later";

		return $words.$con;
	}
}

if (! function_exists('collect_count'))
{
	function collect_count($array, $count)
	{
		$return = [];
		for ($i=0; $i <= $count-1 ; $i++)
		{
			if(count($array) >= $count)
				array_push($return, $array[$i]);
		}
		return collect($return);
	}
}

if (! function_exists('same_collection'))
{
	function same_collection($collection1, $collection2)
	{
		if(count($collection1->diffAssoc($collection2)) == 0)
			return true;
		return false;
	}
}

if (! function_exists('nullToZero'))
{
	function nullToZero($num)
	{
		if ($num == NULL) {
			return 0;
		}

		return $num;
	}
}

if (! function_exists('zeroToNull'))
{
	function zeroToNull($num)
	{
		if ($num == 0) {
			return null;
		}

		return $num;
	}
}

if (! function_exists('emptyToDash'))
{
	function emptyToDash($ch)
	{
		if ($ch == NULL || $ch == '') {
			return '-';
		}

		return $ch;
	}
}

if (! function_exists('generateNik'))
{
	function generateNik()
	{
		return strval(time()). strval(mt_rand(1000, 9999));
	}
}

if (! function_exists('getListTahun'))
{
	function getListTahun()
	{
		$x = intval(date("Y"));
		$len = 10;
		$tahun = [];

		for ($i=($x-$len); $i <= ($x+$len); $i++) {
			$tahun[$i] = $i;
		}

		return $tahun;
	}
}

if (! function_exists('getExcelColumns'))
{
	function getExcelColumns()
	{
		$x = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ', 'BB', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ'];

		return $x;
	}
}

if (!function_exists('dateFormat')) {
	function dateFormat($val, $formatFrom, $formatTo='Y-m-d')
	{
		$val = str_replace("/", "-", $val);

		if ($val == NULL || $val == "") {
			return null;
		}

		$date = date_create_from_format($formatFrom, $val);
		if ($date === FALSE) {
			return null;
		}

		return date_format($date, $formatTo);
	}
}

if (!function_exists('convert')) {
	function convert($size)
	{
	    $unit=array('b','kb','mb','gb','tb','pb');
	    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
	}
}

if (!function_exists('getRangeData')) {
	function getRangeData($range, $total)
	{
		$sisa = $total % $range;
		$max = $total / $range;
		$max = intval($max) * $range;
		$range_picker = [];

		for($i = 1; $i <= $max; $i += $range) {
		 $range_picker[$i-1] = angkaIndo($i). " - ". angkaIndo(($i-1+$range));
		}

		if($sisa > 0) {
		 $range_picker[$max] = angkaIndo(($max+1)). " - ". angkaIndo(($max + $sisa));
		}

		return $range_picker;
	}
}

if (!function_exists('angkaIndo')) {
	function angkaIndo($num)
	{
		return number_format($num,0,",",".");
	}
}

if (!function_exists('status')) {
	function status($id_status)
	{
        switch($id_status){
            case 0:
                return "Belum Disetujui";
                break;
            case 1:
                return "Diterima";
                break;
            case 2:
                return "Ditolak";

        }
	}
}
if (!function_exists('status_span')) {
	function status_span($id_status)
	{
        switch($id_status){
            case 0:
                echo '<span class="badge bg-primary">Belum Disetujui</span>';
                break;
            case 1:
                echo '<span class="badge bg-success">Diterima</span>';
                break;
            case 2:
                echo '<span class="badge bg-danger">Ditolak</span>';

        }
	}
}
if (!function_exists('status_dokumen')) {
	function status_dokumen($id_status)
	{
        if($id_status == 0){
            echo '<span class="badge bg-danger"> Belum Upload Dokumen</span>';
        }
        else{
            echo '<span class="badge bg-success">Dokumen Terupload</span>';
        }
	}
}

if (!function_exists('status_anggota')) {
	function status_anggota($id_status)
	{
        if($id_status == 0){
            echo '<span class="badge bg-danger"> Belum Mengisi Data Anggota</span>';
        }
        else{
            echo '<span class="badge bg-success">Data Anggota terisi</span>';
        }
	}
}

if (!function_exists('status_analisa')) {
	function status_analisa($analisa)
	{
        if($analisa == '0'){
            echo '<span class="badge bg-primary">Belum Dianalisa</span>';
        }
        elseif($analisa == '1'){
            echo '<span class="badge bg-info">Masuk Analisa</span>';
        }
        elseif($analisa == '2'){
            echo '<span class="badge bg-success">Sudah Dianalisa</span>';
        }
	}
}

if (!function_exists('status_rekomendasi')) {
	function status_rekomendasi($analisa)
	{
        if($analisa == 'DIREKOMENDASIKAN'){
            echo '<span class="badge bg-success">DIREKOMENDASIKAN</span>';
        }
        elseif($analisa == 'TIDAK DIREKOMENDASIKAN'){
            echo '<span class="badge bg-danger">TIDAK DIREKOMENDASIKAN</span>';
        }
	}
}

if (!function_exists('status_perpanjangan')) {
	function status_perpanjangan($parent)
	{
        if($parent == "0"){
            echo '<span class="badge bg-primary">Tidak</span>';
        }
        else{
            echo '<span class="badge bg-success">Iya</span>';
        }
	}
}

if (!function_exists('status_blacklist')) {
	function status_blacklist($id_status)
	{
        switch($id_status){
            case 0:
                return "Aktif";
                break;
            case 1:
                return "Blacklist";
        }
	}
}

if (!function_exists('jenis_permohonan')) {
	function jenis_permohonan($id_jenispermohonan)
	{
        switch($id_jenispermohonan){
            case 1:
                return "PERMOHONAN REKOMENDASI MAGANG / PKL / KKN / PRAKTEK KULIAH";
                break;
            case 2:
                return "PERMOHONAN REKOMENDASI PENELITIAN/SURVEY ";
        }
	}
}

if (!function_exists('ubahNamaKabupaten')) {
	function ubahNamaKabupaten($namaKabupaten) {
		// Mengecek apakah teks mengandung kata "Kabupaten"
		if (strpos($namaKabupaten, 'KABUPATEN') !== false) {
			// Mengganti "Kabupaten" dengan "Bupati"
			$namaKabupaten = str_replace('KABUPATEN', 'BUPATI', $namaKabupaten);
		}else{
			$namaKabupaten = str_replace('KOTA', 'WALIKOTA', $namaKabupaten);
		}
		return $namaKabupaten;
	}

}


if (!function_exists('angkaNip')) {
    function angkaNip($nip) {
        return preg_replace('/(.{8})(.{6})(.)/', '$1 $2 $3', $nip);
    }
}

if (!function_exists('jenis_permohonan2')) {
	function jenis_permohonan2($id_jenispermohonan)
	{
        switch($id_jenispermohonan){
            case 1:
                return "Magang/PKL/KKN/Praktek Kuliah";
                break;
            case 2:
                return "Penelitian/Survey/Research ";
        }
	}
}

if (!function_exists('status_ttd')) {
	function status_ttd($id_pejabat)
	{
        if ($id_pejabat == null) {
            echo '<span class="badge bg-primary">Belum Tanda-tangan</span>';
        }
        else{
            echo '<span class="badge bg-success">Sudah Tanda-tangan</span>';
        }
	}
}

if (!function_exists('status_ttd')) {
	function status_berkas($id_berkas)
	{
        if ($id_berkas == null) {
            # code...
            return "Belum Melakukan Upload Berkas";
        }
        else{
            return "Berkas Terupload ";
        }
	}
}

if(!function_exists('getRomawi')){
    function getRomawi($bln) {
        switch ($bln) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }
}

