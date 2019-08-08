<!DOCTYPE html>
<html>

<head>
  <style>
    #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      background-color: #fafafa;
      color: #0073aa;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #FFFFFF;
    }

    .edit-prd {
      display: none;
      text-decoration: none;

    }

    #customers tr:hover {
      background-color: #ddd;
      cursor: pointer;
    }

    #customers tr:hover .edit-prd {
      display: inline-block;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;


    }

    .list-table {
      margin: 10px;
    }

    .span-foat {
      float: right;
    }

    .header1 {
      margin-top: 30px;
      margin-bottom: 30px;
      margin-left: 10px;
    }

    #select-table {
      margin-left: 10px;
      margin-right: 10px;
    }

    .page-title-action:link,
    .page-title-action:visited {
      background-color: #f7f7f7;
      color: #0073aa;
      padding: 5px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      border-radius: 3px;
      margin-left: 10px;
      border: 1px solid #ccc;

    }

    .page-title-action:hover,
    .page-title-action:active {
      background-color: #0073aa;
      cursor: pointer;
      color: #f7f7f7;
    }

    .right-form {
      float: right;
    }

    button {
      background: #f7f7f7;
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 5px;
      color: #555;

    }

    button:hover {
      background: #e0e0e0;
      border: 1px solid #9e9e9e;
      padding: 5px;
      color: #212121;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="main">
    <?php
    global $wpdb;
    if (isset($_POST['search-prd'])) {
      $search = $_POST['search-product'];
      $search_arr = explode(' ', $search);
      $search_cc  = implode('%', $search_arr);
      $myrows = $wpdb->get_results("SELECT * FROM kh_product WHERE prd_name LIKE '%$search_cc%' ORDER BY prd_id DESC", OBJECT);
    } else {
      if (isset($_POST['smb'])) {
        $line = $_POST['limit-line'];
      } else {
        $line = 10;
      }
      $myrows = $wpdb->get_results("SELECT * FROM kh_product ORDER BY prd_id DESC limit $line", OBJECT);
    }
    ?>
    <div class="header1">
      <span style="font-size: 20px; float: left;">Products</span>
      <a href="http://localhost:99/wordpress/wp-admin/admin.php?page=khanh-wp-my-setting-2-add-prd" class="page-title-action">Add New</a></br>
      <form action="" method="post" class="right-form">
        <input type="search" name="search-product">
        <button type="submit" name="search-prd">Search product</button>
      </form>
    </div>
    <div class="menu1">

    </div>
    <div id="select-table">
      <?php
      
      ?>
      <form action="" method="post">
        <select name="" id="">
          <option value="0" selected>Bulk actions</option>
          <option value="1" style="color: red;">Delete</option>
        </select>
        <input type="submit" class="button action" value="Apply">
        <select name="limit-line" id="">
          <option value=2 <?php if ($line == 2) {
                            echo 'selected';
                          } ?>>2</option>
          <option value=5 <?php if ($line == 5) {
                            echo 'selected';
                          } ?>>5</option>
          <option value=10 <?php if ($line == 10) {
                              echo 'selected';
                            } ?>>10</option>
          <option value=20 <?php if ($line == 20) {
                              echo 'selected';
                            } ?>>20</option>
          <option value=50 <?php if ($line == 50) {
                              echo 'selected';
                            } ?>>50</option>
          <option value=100 <?php if ($line == 100) {
                              echo 'selected';
                            } ?>>100</option>
        </select>
        <button type="submit" name="smb">line number</button>
        <span class="span-foat"><?php 
                                $count_product = $wpdb->get_var(" SELECT COUNT(*)
                                 FROM kh_product");
                                echo $count_product; ?> item</span>
      </form>
    </div>
    <div class="list-table">
      <?php
      ?>
      <table id="customers">
        <tr>
          <th><input onchange="checkAll(this)" name="chk[]" type="checkbox" value="<?php ?>"></th>
          <th>Name</th>
          <th>Price - (VND)</th>
          <th>Description</th>
          <th>Date</th>
          <th>Status</th>

        </tr>
        <?php
        foreach ($myrows as $product) { ?>
          <tr>
            <td><input name="checkbox" type="checkbox" value="<?php ?>"></td>
            <td style="font-weight: bold;"><?php echo $product->prd_name; ?></br>
              <a class="edit-prd" href="http://localhost:99/wordpress/wp-admin/admin.php?page=khanh-wp-my-setting-2-edit-prd&prd_id=<?php echo $product->prd_id?>" style="font-weight: normal; padding-top: 5px;">edit | </a>
              <a class="edit-prd" href="http://localhost:99/wordpress/wp-admin/admin.php?page=khanh-wp-my-setting-2-del-prd&prd_id=<?php echo $product->prd_id?>" style="color: red; font-weight: normal; padding-top: 5px;">Delete</a>
            </td>
            <td><?php echo number_format($product->prd_price); ?> VNĐ</td>
            <td><?php echo $product->prd_details; ?></td>
            <td><?php echo $product->prd_date; ?></td>
            <td><?php if ($product->prd_status == 1) {
                  echo '<p>Còn hàng</p>';
                } else {
                  echo '<p style="color: red;">Hết hàng</p>';
                } ?></td>
          </tr>
        <?php } ?>
        <tr>
          <th><input onchange="checkAll(this)" name="chk[]" type="checkbox" value="<?php ?>"></th>
          <th>Name</th>
          <th>Price - (VND)</th>
          <th>Description</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
      </table>
    </div>
    <div id="select-table">
      <select name="" id="">
        <option value="0" selected>Bulk actions</option>
        <option value="1">Delete</option>
      </select>
      <input type="submit" class="button action" value="Apply">
      <span class="span-foat"><?php echo $count_product; ?> item</span>
    </div>
  </div>
  <script>
    function checkAll(ele) {
      var checkboxes = document.getElementsByTagName('input');
      if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].type == 'checkbox') {
            checkboxes[i].checked = true;
          }
        }
      } else {
        for (var i = 0; i < checkboxes.length; i++) {
          console.log(i)
          if (checkboxes[i].type == 'checkbox') {
            checkboxes[i].checked = false;
          }
        }
      }
    }
  </script>
</body>

</html>