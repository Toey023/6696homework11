<?php
include("conn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- เพิ่มส่วน ใช้งาน Bootstrap -->
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- ส่วนของ DataTable -->
  <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  <!-- เพิ่มส่วน ใช้งาน Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Sriracha&display=swap" rel="stylesheet">

  <!-- เพิ่ม CSS ให้ใช้ Font  -->


  <style>
    body {
      font-family: "IBM Plex Sans Thai", serif;
      font-weight: 500;
      font-style: normal;
      margin-left: 150px;
      margin-right: 100px;
      margin-top: 100px;
      margin-bottom: 200px;
      color: #8B3A3A;
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ผักบ้านๆของผมอร่อยครับ</title>
</head>

<body>

  <?php
  if (isset($_GET['action_even']) == 'delete') {
    //echo "Test";

    $vegetable_id = $_GET['vegetable_id'];
    $sql = "SELECT * FROM จัดเก็บผัก WHERE vegetable_id=$vegetable_id";
    // echo $sql;
    $result = $conn->query($sql);
    // $lvsql =mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
      // sql to delete a record
      $sql = "DELETE FROM จัดเก็บผัก WHERE vegetable_id=$vegetable_id";

      if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>ลบข้อมูลสำเร็จ</div>";
      } else {
        echo "<div class='alert alert-danger'>ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ '</div>" . $conn->error;
      }
      // $conn->close();
    } else {
      echo 'ไม่พบข้อมูล กรุณาตรวจสอบ';
    }
  }
  ?>

  <h1>ตารางข้อมูลจัดเก็บผักตรับบบบ</h1>
  <table id="example" class="table table-striped" style="width:100%">
    <thead>
      <tr>

        <th>รหัสผัก</th>
        <th>ชื่อผัก</th>
        <th>ประเภท</th>
        <th>จำนวน</th>
        <th>ฤดูกาลผัก</th>
        <th>ผู้จัดเก็บ</th>
        <th>สถานที่จัดเก็บ</th>

      </tr>
    </thead>
    <tbody>

      <?php
      $sql = "SELECT * FROM จัดเก็บผัก";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["vegetable_id"] . "</td>";
          echo "<td>" . $row["veg_name"] . "</td>";
          echo "<td>" . $row["type"] . "</td>";
          echo "<td>" . $row["quantity"] . "</td>";
          echo "<td>" . $row["season"] . "</td>";
          echo "<td>" . $row["collector"] . "</td>";
          echo "<td>" . $row["treasury"] . "</td>";
          echo '<td>
                <a type="button" href="show.php?action_even=del&vegetable_id=' . $row['vegetable_id'] . '" title="ลบข้อมูล" onclick="return confirm(\'ต้องการจะลบข้อมูลรายชื่อ ' . $row['vegetable_id'] . ' ' . $row['veg_name'] . ' ' . $row['collector'] . '?\')" class="btn btn-danger btn-sm"> ลบข้อมูล </a>  
                    
                <a type="button" href="edit.php?action_even=edit&vegetable_id=' . $row['vegetable_id'] . '" 
            title="แก้ไขข้อมูล" onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลรายชื่อ ' . $row['vegetable_id'] . ' ' . $row['veg_name'] . ' ' . $row['collector'] . '?\')" class="btn btn-primary btn-sm"> แก้ไขข้อมูล </a> </td>';

          echo "</tr>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>

    </tbody>
  </table>

</body>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.2.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.0/js/dataTables.bootstrap5.js"></script>

<script>
  new DataTable('#example');
</script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>