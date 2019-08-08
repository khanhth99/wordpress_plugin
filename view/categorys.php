<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .main {
            width: 100%;

        }

        .main .left {
            width: 35%;
            float: left;

        }

        .main .right {
            width: 65%;
            float: right;
        }

        .input1 {
            width: 85%;
        }

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

        #customers tr:hover {
            background-color: #ddd;
            cursor: pointer;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;


        }

        .alert {
            width: 200px;
            padding: 5px 5px;
            border-radius: 4px;
        }

        .alert-danger {
            background: #bdbdbd;
            color: #212121;
        }

        .alert-success {
            background: #bdbdbd;
            color: #212121;
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

        .table-list {
            margin: 10px;
        }

        .span-foat {
            float: right;
        }

        #select-table {
            margin-left: 10px;
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <h3>Categories</h3>
    <div class="main">
        <div class="left">
            <?php

            global $wpdb;
            if (isset($_POST['smb'])) {

                $cat_name = $_POST['cat_name'];
                $cat_pes = $_POST['prd_details'];
                $row = $wpdb->get_row("SELECT * FROM kh_category WHERE cat_name = '$cat_name'");
                if ($row == 1) {
                    $message = '<div class="alert alert-danger">Danh mục đã tồn tại !</div>';
                    echo "<script type='text/javascript'>alert('Danh mục đã tồn tại !');</script>";
                    //echo '';
                } else {
                    //echo '<div class="alert alert-success">Thêm thành công :V</div>';
                    echo "<script type='text/javascript'>alert('Thêm thành công');</script>";
                    $wpdb->insert(
                        'kh_category',
                        array(
                            'cat_name' => $cat_name,
                            'cat_des' => $cat_pes
                        ),
                        array(
                            '%s',
                            '%s'
                        )
                    );
                }
            }

            ?>

            <form method="post">
                <H4>Add new category</H4>
                <label for="fname">Name</label></br>
                <input class="input1" type="text" required id="fname" name="cat_name"></br>
                <p style="font-size: 13px; font-style: italic;">The name is how it appears on your site.</p></br>
                <label for="fname">Description</label></br>
                <textarea id="editor1" name="prd_details" class="form-control" style="width:85%; height: 200px;"></textarea>
                <p style="font-size: 13px; font-style: italic; padding-right: 20px;">The description is not prominent by default; however, some themes may show it.</p>
                <button class="button1" type="submit" name="smb">Add new category</button>
            </form>
        </div>
        <div class="right">
            <div id="select-table">
                <select name="" id="">
                    <option value="0" selected>Bulk actions</option>
                    <option value="1">Delete</option>
                </select>
                <input type="submit" class="button action" value="Apply">
                <span class="span-foat"><?php $count_cate = $wpdb->get_var(" SELECT COUNT(*)
                                 FROM kh_category");
                                        echo $count_cate; ?> item</span>
            </div>
            <div class="table-list">
                <?php
                $myrows = $wpdb->get_results("SELECT * FROM kh_category", OBJECT); ?>
                <table id="customers">
                    <tr>
                    <th><input onchange="checkAll(this)" name="chk[]" type="checkbox" value="<?php ?>"></th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                    <?php
                    foreach ($myrows as $category) { ?>
                        <tr>
                        <td><input name="checkbox" type="checkbox" value="<?php ?>"></td>
                            <td><?php echo $category->cat_name; ?></td>
                            <td><?php if($category->cat_des == ''){ echo '----';}else{ echo $category->cat_des; } ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                    <th><input onchange="checkAll(this)" name="chk[]" type="checkbox" value="<?php ?>"></th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                </table>
            </div>
            <div id="select-table">
                <select name="" id="">
                    <option value="0" selected>Bulk actions</option>
                    <option value="1">Delete</option>
                </select>
                <input type="submit" class="button action" value="Apply">
                <span class="span-foat" style="padding: 5px;"><?php echo $count_cate; ?> item</span>
            </div>
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