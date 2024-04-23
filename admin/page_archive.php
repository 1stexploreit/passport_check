<?php include('session.php');
include('header.php');
?>

<script type="text/javascript">
  function remove(id) {
    if (confirm(' Sure to remove this photo ? ')) {
      window.location = 'page_delete.php?remove_id=' + id;
    }
  }
</script>

<div class="mt-4 page-title">

  Pages <i class="fas fa-angle-right"></i>Pages Archive
</div>

<div class="card mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <br>
      <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5%" align="left" valign="top">ID</th>
            <th width="52%" align="left" valign="top">Title</th>
            <th width="6%" align="left" valign="top" nowrap>Link Menu</th>
 
            <th width="10%" align="left" valign="top" nowrap>Date</th>
            <th width="6%" align="right" valign="top" nowrap="nowrap">&nbsp;</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM tbl_page   ORDER BY id DESC";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>

              <tr>
                <td align="left"><a href="page_edit.php?id=<?php echo $row['id']; ?>"> <?php echo $row['id']; ?></a></td>
                <td align="left"><a href="page_edit.php?id=<?php echo $row['id']; ?>"> <?php echo $row['title']; ?></a></td>
                <td align="left" nowrap><?php echo $row['menu']; ?></td>
  
                <td align="left" nowrap><?php echo $row['created']; ?></td>
                <td align="right" nowrap="nowrap">

                  <a class="btn btn-success" href="page_edit.php?id=<?php echo $row['id']; ?>"> <i class="fas fa-edit"></i></a>
                  <a class="btn btn-danger" style="display: <?php if($row['type']=='1') {echo "None";} ?>"  href="javascript:remove(<?php echo $row['id'] ?>)"><i class="fa fa-times" aria-hidden="true"></i></a>

                </td>
              </tr>
          <?php
            }
          }
          ?>
      </table>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>
<script>
  $('#dataTable').dataTable({
    "order": [
      [0, 'desc']
    ]
  });
</script>