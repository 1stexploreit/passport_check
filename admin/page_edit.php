<?php include('session.php');

$get_id = $_GET['id'];



if (isset($_POST['sign_up'])) {

  $title = $_POST['title'];
  $menu = $_POST['menu'];
  $contants = $_POST['contants'];
  $meta = $_POST['meta'];
  $keywords = $_POST['keywords'];
  $photo = 'photo' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
  move_uploaded_file($_FILES["photo"]["tmp_name"], "../uploads/" . $photo);


  if (!empty($_FILES['photo']['name'])) {

    $sql = $conn->prepare("UPDATE tbl_page SET title=?, menu=?, contants=?, meta=? ,keywords=?,photo=?   WHERE id=?");
    $sql->bind_param("ssssssi", $title, $menu,  $contants, $meta, $keywords, $photo, $_GET["id"]);
  } else {
    $sql = $conn->prepare("UPDATE tbl_page SET title=?, menu=?,  contants=?, meta=? ,keywords=?  WHERE id=?");
    $sql->bind_param("sssssi", $title, $menu,  $contants, $meta, $keywords, $_GET["id"]);
  }

  if ($sql->execute()) {
    echo ("<script LANGUAGE='JavaScript'>
  window.history.go(-2)
   </script>");
  }
}

$sql = mysqli_query($conn, "SELECT  * from tbl_page where id ='$get_id'");
if (mysqli_num_rows($sql) === 1) {
  $row = mysqli_fetch_assoc($sql);
}



include('header.php');

?>
 

<div class="mt-4 page-title"> Dashboard <i class="fas fa-angle-right"></i> Page Edit</div>

<form name="sign_up" enctype="multipart/form-data" method="post">
  <div class="row">
    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="form-group col-md-12">
              <label>PAGE TITLE</label>
              <input class="form-control" name="title" type="text" autofocus required pattern="[^&lt;&gt;,]+" tabindex="1" value="<?php echo $row['title']; ?>" size="50" />
            </div>
            <div class="form-group col-md-12">
              <textarea class="form-control" name="contants" cols="40" rows="12" id="code_preview0"><?php echo $row['contants']; ?> </textarea>
            </div>
            <div class="form-group col-md-12">
              <label><i class="fas fa-th" aria-hidden="true"></i> Meta Description:</label>
              <textarea class="form-control" name="meta" cols="40" rows="4" placeholder="Short drescription about this page..."><?php echo $row['meta']; ?></textarea>
            </div>
            <div class="form-group col-md-12">
              <label><i class="fas fa-key" aria-hidden="true"></i> Keywords:</label>
              <textarea class="form-control" name="keywords" cols="40" rows="3" placeholder="Focus words of this page..."><?php echo $row['keywords']; ?></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-4">
        <div class="card-body">
          <label><i class="fas fa-image"></i> PHOTO (JPG)</label>
          <div class="form-group">
            <input class="form-control" name="photo" type="file" id="f" onchange="ValidateSingleInput(this);" accept=".jpg" />
          </div>
          <label><i class="fas fa-list"></i> Menu</label>
          <div class="form-group">
		  
		     <select class="form-control" name="menu" required>
				<option value="<?php echo $row["menu"]; ?>"><?php echo $row["menu"]; ?></option>
				<option value="Fixed">Fixed</option>
				<option value="Visa Process">Visa Process</option>
				<option value="Testimonial">Testimonial</option>
            </select>
 

          </div>

        </div>
        <div class="card-footer">
          <button class="btn btn-success" type="submit" name="sign_up"><i class="fas fa-save"></i> Save </button>
          <button class="btn btn-secondary" type="reset"> Reset </button>
        </div>
        </div>
        </div>
        </div>
</form>
<?php include('footer.php'); ?>