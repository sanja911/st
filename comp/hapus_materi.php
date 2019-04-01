<?php
session_start();
include "koneksi.php";
$id	= $_GET['id'];
$hasil  = mysql_query("SELECT * FROM berkas where id_materi='$id'");
$out = mysql_fetch_assoc($hasil);
$myFile = "/tutor2/comp/user_data/".$out['berkas'];
$sql= mysql_query("DELETE FROM materi WHERE id_materi='$id'");
$sql2= mysql_query("DELETE FROM berkas WHERE id_materi='$id'");
if ($sql){
    unlink($_SERVER['DOCUMENT_ROOT'].$myFile) or die("File tidak dapat dihapus karena" .mysql_error());
    //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../tutor/kelas.php">';
}elseif ($sql2){
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../tutor/kelas.php">';
} else {
   		echo "Error!" .mysql_error();
    }
       exit;

?>
