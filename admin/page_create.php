<?php include('session.php');

 
if (isset($_POST['sign_up'])) {

	$menu = $_POST['menu'];
	$title = $_POST['title'];
	$created = $_POST['created'];
	$contants =   $_POST['contants'];
	$meta = $_POST['meta'];
	$keywords = $_POST['keywords'];
	
	$photo = 'photo' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
	move_uploaded_file($_FILES["photo"]["tmp_name"], "../uploads/" . $photo);


	$sql = $conn->prepare("INSERT INTO  tbl_page (menu,title,created,contants,photo,meta,keywords) VALUES (?,?,?,?,?,?,?)"); 
	$sql->bind_param("sssssss", $menu,$title,$created,$contants,$photo,$meta,$keywords); 
		
		if($sql->execute()) {

      echo ("<script LANGUAGE='JavaScript'>
      window.alert('Succesfully Saved');
      window.location.href='index.php';
      </script>");

    }
  }
 
include('header.php');
?>

 
<form name="sign_up" enctype="multipart/form-data" method="post">
  <div class="row mt-5">
    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="form-group col-md-12">
              <label>PAGE TITLE</label>
              <input class="form-control" name="title" type="text" autofocus required pattern="[^&lt;&gt;,]+" />
            </div>
            <div class="form-group col-md-12">
              <textarea class="form-control" name="contants" cols="40" rows="12" id="code_preview0"> </textarea>
            </div>
            <div class="form-group col-md-12">
              <label><i class="fas fa-th" aria-hidden="true"></i> Meta Description:</label>
              <textarea class="form-control" name="meta" cols="40" rows="4" placeholder="Short drescription about this page..."> </textarea>
            </div>
            <div class="form-group col-md-12">
              <label><i class="fas fa-key" aria-hidden="true"></i> Keywords:</label>
              <textarea class="form-control" name="keywords" cols="40" rows="3" placeholder="Focus words of this page..."> </textarea>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-4">
        <div class="card-body">

          <label><i class="fas fa-list"></i> Menu</label>
          <div class="form-group">

            <select class="form-control" name="menu" required>
            <option>---</option>
			<option value="Fixed">Fixed</option>
			<option value="News">Whats is New</option>
			<option value="Testimonial">Testimonial</option>
            </select>
          </div>

          <label><i class="fas fa-image"></i> PHOTO (JPG)</label>
          <div class="form-group">
            <input class="form-control" name="photo" type="file" id="f" onchange="ValidateSingleInput(this);" accept=".jpg" />
          </div>
          </div>
		  
    
          <div class="card-footer">
          <input name="created" type="date"  required hidden="" id="dateDefault"  />
            <button class="btn btn-success" type="submit" name="sign_up"><i class="fas fa-save"></i> Save </button>
            <button class="btn btn-secondary" type="reset"> Reset </button>
          </div>
          </div>
          </div>
          </div>
</form>
<?php include('footer.php'); ?>

 

<script type='text/javascript'>
  window.onload = function() {
    document.getElementById('button').onclick = function() {
      document.getElementById('modal').style.display = "none"
    };
  };
</script>
<script>
  function setInputDate(_id) {
    var _dat = document.querySelector(_id);
    var hoy = new Date(),
      d = hoy.getDate(),
      m = hoy.getMonth() + 1,
      y = hoy.getFullYear(),
      data;

    if (d < 10) {
      d = "0" + d;
    };
    if (m < 10) {
      m = "0" + m;
    };

    data = y + "-" + m + "-" + d;
    console.log(data);
    _dat.value = data;
  };

  setInputDate("#dateDefault");
</script>