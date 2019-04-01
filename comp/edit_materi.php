<?php
session_start();
include "koneksi.php";
	
?>
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Halaman Tutor</title>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
<link href="../assets/css/datepicker3.css" rel="stylesheet">
<link href="../assets/css/styles.css" rel="stylesheet">
<link href="../assets/ckeditor/styles.css" rel="stylesheet">
<link href="../assets/css/dropzone.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
<link rel="stylesheet" href="../assets/css/select2.min.css"/>
<script type="text/javascript" src="../assets/aset/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/dropzone.js"></script>
<script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>
<script  type="text/javascript" src="../assets/aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
</head>
<body>
<?php
$id=$_GET['id'];
$modal=mysql_query("SELECT * FROM materi WHERE id_materi='$id'");
$outp=mysql_fetch_array($modal);
$sql = "select * from ambil_mapel where id_mapel='$outp[id_mapel]'";
$hasil = mysql_query($sql);
$data  = mysql_fetch_array($hasil);
?>
<div class="modal-dialog" role="dialog">
<div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Kelas<?php echo $outp['id_kelas'];?></h4>
            </div>
            <input type="hidden" value="<?php echo $id;?>" name="id" disabled>
            <div class="modal-body">
                <form action="buat_materi.php?op=ed" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="col-md-6">
                  <div class="form-group"><label>Mapel </label>
                    <select id="mapel2" name="id_mapel" class="form-control select2">
                        <option value="<?php echo $data['mapel'];?>"><?php echo $data['mapel'];?></option>
                  <?php
                        $sql = mysql_query("SELECT * FROM ambil_mapel where id_user='$out[id_user]'");
                          while($data = mysql_fetch_array($sql)){
                      ?>
                    <option value="<?php echo $data['id_mapel'];?>"><?php echo $data['mapel']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    </div>
                    
                  </div>
                  <div class="col-md-6">
                  <div class="form-group"><label>Kelas</label>
                    <select id="mapel1" name="id_kelas" class="form-control select2">
                        <option value=""><?php echo $outp['id_kelas'];?></option>
                  <?php
                        $sql = mysql_query("SELECT * FROM kelas where id_tutor='$out[id_user]'");
                          while($data = mysql_fetch_array($sql)){
                      ?>
                    <option value="<?php echo $data['id_kelas'];?>"><?php echo $data['id_kelas']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    </div>
                    
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                  <div class="form-group"><label>Judul</label>
                   <input class="form-control" placeholder="Judul" name="judul" type="text" autofocus="" value="<?php echo $outp['judul'];?>" required >
                  </div></div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  <div class="form-group"><label>ID</label>
                   <input class="form-control" placeholder="Judul" name="id" type="text" autofocus="" value="<?php echo $id;?>" disabled>
                  </div></div>
                </div>
                <div class="row">
                
                <div class="col-md-12">
                    <div class="form-group"><label>Materi</label>
                    <textarea class="editor1" id="editor1" name="materi"><?php echo $outp['materi'];?></textarea>
                  </div>
                </div>
                <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
                </div>
                <div class="row">
                <div class="col-md-12">
                <div class="form-group dropzone"><label>Update File</label>
                <div class="fallback">
                   <input class="form-control" name="file" type="file" autofocus="" multiple>*pdf,docx,pptx,mp4,avi (dapat drag & drop untuk upload)
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info" name="submit_row">Update</button>
            </div>
          </form>
          </div>

</div>
</div>
</body>