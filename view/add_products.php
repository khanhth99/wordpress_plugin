<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    label {
      margin-top: 15px;
    }

    .button1 {
      background: #0085ba;
      border-radius: 4px;
      border: none;
      color: white;
      padding: 5px 5px;
      cursor: pointer;
      margin: 10px;
    }
    .button1:hover {
            background: #006799;
        }
  </style>
</head>

<body>

  <h3>Add Product</h3>


  <div class="container">
    <form method="post">
      <label class="txt1">Name</label></br>
      <input type="text" required id="fname" name="prd_name" style="width: 600px"></br>
      <label for="fname">Price</label></br>
      <input type="text" required id="fname" name="prd_price" style="width: 600px"></br>

      <label for="country">Category</label>
      <?php
      global $wpdb;
      $myrows = $wpdb->get_results("SELECT * FROM kh_category ORDER BY cat_id DESC");
      ?>
      <select id="country" name="cat_id" style="width: 150px"></br>
        <?php
        foreach ($myrows as $cate) {  ?>
          <option value="<?php echo $cate->cat_id; ?>" selected><?php echo $cate->cat_name;  ?></option>
          <?php
        } ?>
      </select>
      <label>Status</label>
      <select id="country" name="status" style="width: 150px"></br>
          <option value="1" selected>Còn hàng</option>
          <option value="0" selected>Hết hàng</option>
      </select>
      <script src="/view/ckeditor/ckeditor.js"></script>
      <br />
      <label for="subject">Description</label></br>
      <!-- <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea> -->
      <textarea id="editor1" name="prd_details" class="form-control" rows="5" cols="5" style="width: 600px; height:200px"></textarea></br>
      <script>
        //CKEDITOR.replace( 'editor1' );
//         CKEDITOR.replace( 'editor1', {
// 	toolbar: [
// 		{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
// 		[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.																		// Line break - next group will be placed in new line.
// 		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
// 	]
// });

      </script>
      <button class="button1" type="submit" name="smb">Add new product</button>
    </form>
  </div>

</body>

</html>
<?php
//require_once khanh_WP_VIEW_DIR.'include/admin.php';
function addDB()
{
  global $wpdb;
  //$table = $wpdb->prefix.'product';
  $prd_name = $_POST['prd_name'];
  $prd_price = $_POST['prd_price'];
  $cat_id = $_POST['cat_id'];
  $prd_details = $_POST['prd_details'];
  $prd_date = current_time('mysql', 1);
  $prd_status = $_POST['status'];
  if (isset($_POST['smb'])) {
    // $sql = $wpdb->prepare("INSERT INTO $table (prd_name,prd_price,prd_category,prd_detail) value('$prd_name','$prd_price','$prd_category','$prd_detail')");
    // $wpdb->query($sql);
    $wpdb->insert(
      'kh_product',
      array(
        'prd_name' => $prd_name,
        'prd_price' => $prd_price,
        'prd_details' => $prd_details,
        'cat_id' => $cat_id,
        'prd_date' =>$prd_date,
        'prd_status'=>$prd_status
      ),
      array(
        '%s',
        '%d',
        '%s',
        '%d',
        '',
        '%d'
      )
    );
  }
}
?>