<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- เพิ่ม ส่วน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- เพิ่มฟอนต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
     font-family: "Kanit", sans-serif;
      font-weight: 500;
      font-style: normal;
      margin-left: 700px;
      margin-right: 0px;
      margin-top: 100px;
      margin-bottom: 200px;
      color: #8B3A3A;
        }

        h1 {
            /* อันนี้กำหนดส่วนย่อหน้าด้านซ้าย */
   
            /* อันนี้กำหนดส่วนย่อหน้าด้านบน */
            margin-top: 50px;
        }
    </style>
    

    <title>เเก้ไขข้อมูลจัดเก็บผักครับบบบ</title>
</head>

<?php
if(isset($_GET['action_even'])=='edit'){
    $vegetable_id=$_GET['vegetable_id'];
    $sql="SELECT * FROM จัดเก็บผัก WHERE vegetable_id=$vegetable_id";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
    }else{
        echo"ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ";
    }
    //$conn->close();
}
?>

<h1>แก้ไขข้อมูลจัดเก็บผัก</h1>

<form action="edit_1.php" method="POST">
    <input type="hidden"name="vegetable_id" value="<?php echo$row['vegetable_id']; ?>">
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> รหัสผัก </label>
        <div class="col-sm-2">
        <label class="col-sm-1 col-form-label"> <?php echo$row['vegetable_id']; ?> </label>

        </div>

        <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ชื่อผัก </label>
        <div class="col-sm-3">
        <input type="text" name="veg_name" class="form-control" maxlength="50" value="<?php echo$row['veg_name']; ?>" required>
        </div>
    </div>

        <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ประเภท </label>
        <div class="col-sm-3">
        <select name="type" class="form-select" aria-label="Default select example">   
            <option > กรุณาระบุประเภท </option>
            <option value="ผักใบ"   <?php if ($row['type']=='ผักใบ'){ echo "selected";} ?> >ผักใบ</option>
            <option value="ผักราก"  <?php if ($row['type']=='ผักราก'){ echo "selected";} ?>>ผักราก</option>
            <option value="ผักผล" <?php if ($row['type']=='ผักผล'){ echo "selected";} ?>>ผักผล</option>
        </select>
        </div>
    </div>

        <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> จำนวน </label>  
        <div class="col-sm-3">
        <input type="text" name="quantity" class="form-control" maxlength="50" value="<?php echo$row['quantity']; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ฤดูกาลผัก </label>
        <div class="col-sm-3">
        <select name="season" class="form-select" aria-label="Default select example">   
            <option > กรุณาระบุคลัง </option>
            <option value="ร้อน"   <?php if ($row['season']=='ร้อน'){ echo "selected";} ?>>ร้อน</option>
            <option value="ฝน"  <?php if ($row['season']=='ฝน'){ echo "selected";} ?>>ฝน</option>
            <option value="หนาว" <?php if ($row['season']=='หนาว'){ echo "selected";} ?>>หนาว</option>
        </select>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label">ผู้จัดเก็บ </label>
        <div class="col-sm-3">
        <input type="text" name="collector" class="form-control" maxlength="50" value="<?php echo$row['collector']; ?>" required>
        </div>
    </div>

        <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> สถานที่จัดเก็บ </label>
        <div class="col-sm-3">
        <select name="treasury" class="form-select" aria-label="Default select example">   
            <option > กรุณาระบุคลัง </option>
            <option value="คลังสินค้า A"   <?php if ($row['treasury']=='คลังสินค้า A'){ echo "selected";} ?>>คลังสินค้า A</option>
            <option value="คลังสินค้า B"  <?php if ($row['treasury']=='คลังสินค้า B'){ echo "selected";} ?>>คลังสินค้า B</option>
            <option value="คลังสินค้า C" <?php if ($row['treasury']=='คลังสินค้า C'){ echo "selected";} ?>>คลังสินค้า C</option>
        </select>
        </div>
    </div>

    </div>
   

    <button type="submit" class="btn btn-primary"> บันทึกข้อมูล</button>
    <button type="reset" class="btn btn-danger"> ยกเลิก</button>

</form>
<br>
    พัฒนาโดย
    664485023 นายรวีโรจน์ ทองเปี่ยม <br>

</head>

</html>