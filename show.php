<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("conn.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลพนักงาน</title>
    <!--bs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">


    <!-- ส่วนของ DataTable -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", serif;
            font-weight: 600;
            font-style: normal;
            margin-left: 100px;
            margin-right: 100px;
            margin-top: 100px;
            margin-bottom: 100px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['action_even']) == 'delete') {
        //echo "Test";

        $employee_id = $_GET['employee_id'];
        $sql = "SELECT * FROM employees WHERE employee_id=$employee_id";
        // echo $sql;
        $result = $conn->query($sql);
        // $lvsql =mysqli_query($conn,$sql);
        if ($result->num_rows > 0) {
            // sql to delete a record
            $sql = "DELETE FROM employees WHERE employee_id =$employee_id";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>ลบข้อมูลสำเร็จ</div>";
            } else {
                echo "<div class='alert alert-danger'>ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ !!! </div>" . $conn->error;
            }
            // $conn->close();
        } else {
            echo 'ไม่พบข้อมูล กรุณาตรวจสอบ';
        }
    }
    ?>

    <h1>แสดงข้อมูลการ์ดจอ</h1>
    <h2>พัฒนาโดย 664485021 นายปัญญาวัฒน์ ภุมมะดิลก</h2>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>รหัส</th>
                <th>แบรนด์</th>
                <th>โมเดล</th>
                <th>ขนาดของmemory</th>
                <th>ชนิดของmemory</th>
                <th>clock speed</th>
                <th>ราคา</th>
                <th>ปีวางจำหน่าย</th>
                <th>จัดการข้อมูล</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM graphics_cards";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . " </td>";
                    echo "<td>" . $row["brand"] . " </td>";
                    echo "<td>" . $row["model"] . " </td>";
                    echo "<td>" . $row["memory_size"] . " </td>";
                    echo "<td>" . $row["memory_type"] . " </td>";
                    echo "<td>" . $row["clock_speed"] . " </td>";
                    echo "<td>" . $row["price"] . " </td>";
                    echo "<td>" . $row["release_year"] . " </td>";
                    echo '<td><a type="button" href="show.php?action_even=del&id=' . $row['id'] . '" title="ลบข้อมูล" onclick="return confirm(\'ต้องการจะลบข้อมูลรายชื่อ ' . $row['id'] . ' ' . $row['brand'] . ' ' . $row['model'] . '?\')" class="btn btn-danger btn-sm"> ลบข้อมูล </a>  
                    
        <a type="button" href="edit.php?action_even=edit&id=' . $row['id'] . '" 
    title="แก้ไขข้อมูล" onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลรายชื่อ ' . $row['id'] . ' ' . $row['brand'] . ' ' . $row['model'] . '?\')" class="btn btn-primary btn-sm"> แก้ไขข้อมูล </a> </td>';
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
    </table>


</body>
<!-- bs js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- datatables js -->

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    new DataTable('#example');
</script>

</html>