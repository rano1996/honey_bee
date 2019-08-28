<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<!-- <input type="file" name="userfile" size="20" /> -->
<div class="row">
                    <div class="col-sm-6 ol-md-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">File Upload1</h3>
                            <label for="input-file-now">Your so fresh input file � Default version</label>
                            <input type="file" id="input-file-now" name="userfile" size="20" class="dropify" />
                        </div>
                    </div>
</div>
<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>