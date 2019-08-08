<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    * {
      box-sizing: border-box;
    }

    label {
      font-size: 20px;
    }

    input[type=text],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }

    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .alert-danger {
      color: #a94442;
      background-color: #f2dede;
      border-color: #ebccd1;
      padding: 20px 20px;
      width: 200px;
      border-radius: 4px;
    }
    .alert-success{
      color: #a94442;
      background-color: #00EE00;
      border-color: #ebccd1;
      padding: 20px 20px;
      width: 200px;
      border-radius: 4px;
    }
    button {
      background-color: #4FE860;
      padding: 10px 10px;
      margin: 10px;
      border-radius: 4px;
      font-size: 15px;
      border: 0px;
      letter-spacing: .05em;
    }

    button:hover {
      background-color: #45a049;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <h3>Thêm Danh Mục</h3>
  <?php
  function add_Category()
  {
    global $wpdb;
    
    
    
    if (isset($_POST['smb'])) {
      
      $cat_name = $_POST['cat_name'];
      $row = $wpdb->get_row("SELECT * FROM kh_category WHERE cat_name = '$cat_name'");
      if ($row == 1) {
        echo '<div class="alert alert-danger">Danh mục đã tồn tại !</div>';
      } else {
        echo '<div class="alert alert-success">Thêm thành công :V</div>';
        $wpdb->insert(
          'kh_category',
          array(
            'cat_name' => $cat_name
          ),
          array(
            '%s'
          )
        );
      }
      
    }
  }
  ?>

  <div class="container">
    <form method="post">
      <label for="fname">Danh mục</label>
      <input type="text" required id="fname" name="cat_name" placeholder="category..." style="width: 350px">
      <button type="submit" name="smb">submit</button>
    </form>
  </div>

</body>

</html>