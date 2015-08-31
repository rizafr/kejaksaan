<?php 
$q_instansi	= $this->db->query("SELECT * FROM tr_instansi LIMIT 1")->row();
?>

<html>
<head>
	<title> SIAPRA -  <?php echo $datpil1->no_agenda; ?> (<?php echo $datpil1->asal_surat_masuk ."_".tgl_jam_sql($datpil1->tgl_surat_masuk)?>) </title>
<style type="text/css" media="print">
	body{font-family: tahoma}
	.border {border: solid 1px #000 ; border-collapse: collapse; width: 100%}
	tr { }
	td { padding: 7px 5px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px; text-decoration:underline; text-transform: UPPERCASE;}
	ol{font-weight:light; text-align:left}
</style>
<style type="text/css" media="screen">
	body{font-family: tahoma}
	.border {border: solid 1px #000 ; border-collapse: collapse; width: 60%}
	.garisBawah { border-bottom : 1px dotted;}
	td { padding: 7px 5px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px; text-decoration:underline; text-transform: UPPERCASE;}
	ol{font-weight:light;text-align:left}
</style>
</head>

<body onload="window.print()">
<table>
	<tr><td colspan="3">
	<h2><?php echo $q_instansi->nama; ?></h2>
	Alamat : <?php echo $q_instansi->alamat; ?>	
	</td>
	</tr>
	
	<tr><td colspan="3" align="center" style="padding: 15px 0"><b style="font-size: 21px;"><u>LEMBAR DISPOSISI</u></b></td></tr>
	
	<tr><td></td><td></td>
	<td  colspan="4"><b align="right">SIFAT SURAT</b>: <?php echo $datpil1->status_surat_masuk; ?></td></tr>
	
	<tr><td><b>INDEX</b></td>
	<td  width="50%"> : <?php echo $datpil1->index_surat_masuk; ?></td>
	<td><b align="right">NO. AGENDA</b>
	: <?php echo $datpil1->no_agenda; ?></td></tr>
	
	<tr><td></td><td></td>
	<td  colspan="4"><b align="right">TGL MASUK</b>: <?php echo tgl_jam_sql($datpil1->tgl_diterima); ?></td></tr>
</table>

<table class="border">
	<tr><td><b>PERIHAL</b></td><td colspan="2">: <?php echo $datpil1->perihal_surat_masuk; ?></td></tr>
	<tr><td width="25%"><b>TGL SURAT</b></td><td colspan="2">: <?php echo tgl_jam_sql($datpil1->tgl_surat_masuk) ?></td></tr>
	<tr><td width="25%"><b>NO SURAT</b></td><td colspan="2">: <?php echo $datpil1->no_surat_masuk; ?></td></tr>
	<tr><td><b>ASAL SURAT</b></td><td colspan="2">: <?php echo $datpil1->asal_surat_masuk; ?></td></tr>
</table>

<table class="border">
	<tr><td style="height: 350px" valign="top" colspan="2" align="center"><b>INSTRUKSI /  INFORMASI: </b> <br>
	<ol align="left">
	<?php 
	if (!empty($datpil3)) {
		foreach ($datpil3 as $d3) {
			echo "<li><i>".$d3->isi_instruksi."</i></li>";
		}
	}
	?>
	</ol>
	</b></td>
	
	<td  align="center" valign="top" width="50%" style="border-left: solid 1px">
	<b>DITERUSKAN KEPADA :</b> 
	<br />
	<p align="left">
	<?php 
	if (!empty($datpil2)) {
		foreach ($datpil2 as $dp) {
			echo "<input type='checkbox'  value='' checked> ".$dp->tujuan_disposisi."<br />";
		}
	}
	?>
	</p>
	</td></tr>
</table>
</body>
</html>
