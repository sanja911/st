<?php
	session_start();
	include "koneksi.php";
	if(!isset($_SESSION['username'])){
		die("Anda belum login");//jika belum login jangan lanjut..
		}
		
		if($_SESSION['akses']!="Tutor"){
		die("Anda bukan tutor");//jika bukan admin jangan lanjut
		}
	$op=$_GET['op'];
	//$id=$_POST['id'];
	$query  = "SELECT * FROM user where username='$_SESSION[username]'";
	$hasil  = mysql_query($query);
	$out = mysql_fetch_assoc($hasil);
	$id_kelas=$_POST['id_kelas'];
	$id_tutor = $out['id_user'];
	$id_mapel = $_POST['id_mapel'];
	$judul=$_POST['judul'];
	$materi=mysql_real_escape_string($_POST['materi']);
	$kueri= "SELECT max(id_materi) as maxKode FROM materi";
	$final = mysql_query($kueri);
	$result  = mysql_fetch_array($final);
	$kodeBarang = $result['maxKode'];
	$noUrut = (int) substr($kodeBarang, 3, 3);
	$noUrut++;
	$char = "0";
	$newID = $char . sprintf("%03s", $noUrut);
	if(isset($_FILES['files'])){
		$errors= array();
		foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
			$file_name = $key.$_FILES['files']['name'][$key];
			$file_size =$_FILES['files']['size'][$key];
			$file_tmp =$_FILES['files']['tmp_name'][$key];
			$file_type=$_FILES['files']['type'][$key];	
			if($file_size > 2097152){
				$errors[]='Ukuran file tidak boleh lebih dari 2 MB';
			}		
		
	if($op=='add'){
	$sql= mysql_query("INSERT INTO materi_tutor VALUES ('$newID','$id_kelas','$id_mapel','$id_tutor','$judul','$materi')");
	$sql2=	mysql_query("INSERT INTO file VALUES ('$newID','$file_name')");

	if ($sql.$sql2){
		$desired_dir="user_data";
		if(empty($errors)==true){
			if(is_dir($desired_dir)==false){
				mkdir("$desired_dir", 0700);		// Create directory if it does not exist
			}
			if(is_dir("$desired_dir/".$file_name)==false){
				move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
			}else{									// rename the file if another one exist
				$new_dir="$desired_dir/".$file_name.time();
				 rename($file_tmp,$new_dir) ;				
			}
		 mysql_query($query);			
		}else{
				print_r($errors);
		}

		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../tutor/kelas.php">';
			} else{
						echo "Error!" .mysql_error();
					}
	}elseif($op='ed'){
		$sql3=mysql_query("UPDATE materi_tutor SET id_kelas= '$id_kelas',id_mapel='$id_mapel',judul='$judul',materi='$materi' WHERE id_materi='$id' AND id_tutor='$id_tutor')");
		$sql4=mysql_query("UPDATE file SET file='$file_name' WHERE id_materi='$id')");
		if($sql3.$sql4){
			$desired_dir="user_data";
		if(empty($errors)==true){
			if(is_dir($desired_dir)==false){
				mkdir("$desired_dir", 0700);		// Create directory if it does not exist
			}
			if(is_dir("$desired_dir/".$file_name)==false){
				move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
			}else{									// rename the file if another one exist
				$new_dir="$desired_dir/".$file_name.time();
				 rename($file_tmp,$new_dir) ;				
			}
		 mysql_query($query);			
		}else{
				print_r($errors);
		}

			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../tutor/kelas.php">';
		}else{
			echo "Error because" .mysql_error();
		}
	}else{
	
	        exit;
			}
			
	 }
		}
	
?>
