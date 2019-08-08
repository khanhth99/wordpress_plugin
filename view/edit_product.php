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

    .label-edit {
      background: #ccc;
      border: 1px solid #111;
      border-radius: 4px;
      padding: 10px;
      margin-bottom: 20px;
      width: 577px;
      text-align: center;
      font-size: 15px;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <h3>Edit Product</h3>
  <div class="container">
    <?php
    global $wpdb;
    $prd_id = $_GET['prd_id'];
    $getprd = $wpdb->get_row("SELECT * FROM kh_product WHERE prd_id = $prd_id");
    ?>
    <form method="post">
      <p class="label-edit">You are editing products: <?php echo $getprd->prd_name ?> !!!</p></br>
      <label class="txt1">Name</label></br>
      <input type="text" required id="fname" name="prd_name" style="width: 600px" value="<?php echo $getprd->prd_name; ?>"></br>
      <label for="fname">Price</label></br>
      <input type="text" required id="fname" name="prd_price" style="width: 600px" value="<?php echo $getprd->prd_price; ?>"></br>
      <label for="country">Category</label>
      <?php
      $myrows = $wpdb->get_results("SELECT * FROM kh_category ORDER BY cat_id DESC");
      ?>
      <select id="country" name="cat_id" style="width: 150px"></br>
        <?php
        foreach ($myrows as $cate) {  ?>
          <option value="<?php echo $cate->cat_id; ?>" <?php if($getprd->cat_id == $cate->cat_id){ echo 'selected';} ?>><?php echo $cate->cat_name;  ?></option>
        <?php
        } ?>
      </select>
      <label>Status</label>
      <select id="country" name="status" style="width: 150px"></br>
        <option value="1" <?php if($getprd->prd_status==1){ echo 'selected';}?>>Còn hàng</option>
        <option value="0" <?php if($getprd->prd_status==0){ echo 'selected';}?>>Hết hàng</option>
      </select>
      <script src="/view/ckeditor/ckeditor.js"></script>
      <br />
      <label for="subject">Description</label></br>
      <!-- <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea> -->
      <textarea id="editor1" name="prd_details" class="form-control" rows="10" cols="10" style="width: 600px; height:200px"><?php echo $getprd->prd_details; ?></textarea></br>
      <script>
        // CKEDITOR.replace( 'editor1' );
      </script>
      <button class="button1" type="submit" name="smb">Update product</button>
    </form>
  </div>
</body>
</html>
<?php
//require_once khanh_WP_VIEW_DIR.'include/admin.php';
function edit_product()
{
  global $wpdb;
  //$table = $wpdb->prefix.'product';
  $prd_id = $_GET['prd_id'];
  $prd_name = $_POST['prd_name'];
  $prd_price = $_POST['prd_price'];
  $cat_id = $_POST['cat_id'];
  $prd_details = $_POST['prd_details'];
  $prd_date = current_time('mysql', 1);
  $prd_status = $_POST['status'];
  if (isset($_POST['smb'])) {
    // $sql = $wpdb->prepare("INSERT INTO $table (prd_name,prd_price,prd_category,prd_detail) value('$prd_name','$prd_price','$prd_category','$prd_detail')");
    // $wpdb->query($sql);
    $wpdb->update(
      'kh_product',
      array(
        'prd_name' => $prd_name,
        'prd_price' => $prd_price,
        'prd_details' => $prd_details,
        'cat_id' => $cat_id,
        'prd_date' => $prd_date,
        'prd_status' => $prd_status
      ),
      array('prd_id' =>  $prd_id),
      array(
        '%s',
        '%d',
        '%s',
        '%d',
        '',
        '%d'
      ),
      array('%d')
    );
  }
}
?>