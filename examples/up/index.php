<!-- form.php -->
<?php 
/*-------------------------------------------------------+
| File Upload In PHP With Database
| http://www.kvcodes.com/
+--------------------------------------------------------+
| Author: Varadha  
| Email: admin@kvcodes.com
+--------------------------------------------------------+*/
?>
<form action="uploads.php" method="post" enctype="multipart/form-data">
 <label> Select File: <input type="file" name="attachment[]" multiple> </label>
 <input type="submit" name="HandleUpload" value="Upload" >
</form>