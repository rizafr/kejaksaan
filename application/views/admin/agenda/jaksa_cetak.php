<?php
//Format Tanggal Berbahasa Indonesia 
// Array Hari
$array_hari = array(1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
$hari = $array_hari[date('N')];

//Format Tanggal 
$tanggal = date('j');

//Array Bulan 
$array_bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$bulan = $array_bulan[date('n')];

//Format Tahun 
$tahun = date('Y');

$file_name = "DATA JAKSA - " . $tanggal . " " . $bulan . " " . $tahun . ".xls";
header("Expires: Mon, 26 Jul 2001 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Cache-control: private");
header("Content-Type: application/vnd.ms-word; name='word'");
header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
?>

<html>
    <title><b> DATA JAKSA <?php echo $nama['nama_jaksa']." NIP. ".$nama['nip']; ?><br/> <?php echo tgl_jam_sql($tgl_start)."</b> sampai dengan tanggal <b>".tgl_jam_sql($tgl_end)."</b>";?></title>
    <head> 
        <meta charset="utf-8">
        <link href="<?php echo base_url(); ?>assets/admin/css/print.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.css" rel="stylesheet" />
    </head>
    <body onload="window.print()">
		<!-- <h3><b> DATA JAKSA <?php //echo $data['nama_jaksa'] ?> <?php //echo tgl_jam_sql($tgl_start)."</b> sampai dengan tanggal <b>".tgl_jam_sql($tgl_end)."</b>";?></h3> -->
        <table border="1" style="border-top:3px solid #004D66; ">
			<tr style="background-color:#004D66;color: #fff ; border:1px solid #eee ; align:center;">
				<th>No</th>
				<th>No. Agenda</th>
				<th>Tanggal Perkara</th>
				<th>Nama Tersangka</th>
				<th>Perkara</th>
			</tr>
				
			<?php 
			if (!empty($data)) {
				$no = 0;
				foreach ($data as $d) {
					$no++;
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $d->no_agenda; ?></td>
					<td><?php echo tgl_jam_sql($d->tanggal_perkara);; ?></td>
					<td><?php echo $d->nama_tersangka; ?></td>
					<td><?php echo $d->perkara; ?></td>
				</tr>
			<?php 
				}
			} else {
				echo "<tr><td colspan='5' style='text-align: center'>Tidak ada data</td></tr>";
			}
			?>
        </table>
    </body>
</html>


<?php echo $map['js']; ?>