
<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Pilih Kelas <?php echo $out['id_user'];?></h4>
            </div>
            <input type="hidden" value="<?php echo $id;?>" name="id" disabled>
            <div class="modal-body">
              <form action="../comp/buat_materi.php?op=add" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="col-md-6">
                  <div class="form-group"><label>Mapel </label>
                    <select id="mapel1" name="id_mapel" class="form-control select2">
                        <option value=""></option>
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
                        <option value=""></option>
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
                   <input class="form-control" placeholder="Judul" name="judul" type="text" autofocus="" required >
                  </div></div>
                </div>
                <div class="row">
                
                <div class="col-md-12">
                    <div class="form-group"><label>Materi</label>
                    <textarea class="ckeditor" id="ckeditor" name="materi"></textarea>
                  </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                <div class="form-group dropzone" id="my-awesome-dropzone"><label>File</label>
                <div class="fallback">
                   <input class="form-control" name="files[]" type="file" autofocus="" multiple>*pdf,docx,pptx,mp4,avi (dapat drag & drop untuk upload)
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info" name="submit_row">Tambahkan</button>
            </div>
          </form>
        </div>

    </div>
</div>
