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

$file_name = "DATA SURAT KELUAR - " . $tanggal . " " . $bulan . " " . $tahun . ".xls";
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
   <h2 align="center"><b> DATA SURAT KELUAR <br /><?php echo tgl_jam_sql($tgl_start)."</b> s/d <b>".tgl_jam_sql($tgl_end)."</b>";?>
	</h2>
	<body>
		<table border="1" style="border-top:3px solid #004D66; ">
			<tr style="background-color:#004D66;color: #fff ; border:1px solid #eee ; align:center;">
				<th width="3%">No</th>
				<th width="5%">Kode Klas</th>
				<th width="28%">Isi Ringkas</th>
				<th width="25%">Tujuan Surat</th>
				<th width="17%">Nomor Surat</th>
				<th width="7%">Tgl. Surat</th>
				<th width="10%">Pengolah</th>
				<th width="5%">Ket</th>
			</tr>
				
			<?php 
			if (!empty($data)) {
				$no = 0;
			foreach ($data as $d) {
				$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $d->kode; ?></td>
				<td><?php echo $d->isi_ringkas; ?></td>
				<td><?php echo $d->tujuan; ?></td>
				<td><?php echo $d->no_surat; ?></td>
				<td><?php echo tgl_jam_sql($d->tgl_surat); ?></td>
				<td><?php echo gval("t_admin", "id", "nama", $d->pengolah); ?></td>
				<td><?php echo $d->keterangan; ?></td>
			</tr>
			<?php 
				}
			} else {
				echo "<tr><td colspan='8' style='text-align: center'>Tidak ada data</td></tr>";
			}
			?>
             </table>
    </body>
</html>