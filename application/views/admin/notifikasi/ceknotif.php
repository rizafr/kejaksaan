<?php
session_start();
include "config.php";
$userid = $_SESSION['userid'];
$pesan = mysql_query("SELECT * FROM tabel_pesan WHERE kepada='$userid' and sudahbaca='N'");
$j = mysql_num_rows($pesan);
if($j>0){
    echo "<table border=0 width=100% style=\"font-size:10pt\">";
}else{
    die("<font color=red size=1>Tidak ada pesan baru yang belum dibaca</font>");
}
while($p = mysql_fetch_array($pesan)){
    echo "<tr><td onmouseover=\"this.style.backgroundColor='skyblue'\"
     onmouseout=\"this.style.backgroundColor='#efefef'\" style='border-bottom: 1px solid #E9E9E9;cursor:pointer'>
     <a href=pesan.php?no=".$p['nomor'].">
	 <img src='gambar/nopic.jpg' align='left' style='padding-right:5px;' />
	 <span style='font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
    font-size: 13px;color:#333;font-weight:bold;'>".$p['dari']."</span></a> <span style='font-size:10px;'>Message You</span><br>
     Waktu : ".$p['waktu']."</td></tr>";
}
echo "</table>";
?>
