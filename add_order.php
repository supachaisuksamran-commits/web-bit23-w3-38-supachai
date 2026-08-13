<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>เพิ่มรายการจอง</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Tahoma,sans-serif;
}

body{
    background:#eef6ff;
}

.container{
    width:450px;
    margin:50px auto;
}

.card{
    background:#fff;
    padding:30px;
    border-radius:10px;
    box-shadow:0 4px 12px rgba(0,0,0,.12);
}

h2{
    text-align:center;
    color:#1e88e5;
    margin-bottom:25px;
}

label{
    display:block;
    margin-top:15px;
    margin-bottom:6px;
    color:#444;
    font-weight:bold;
}

input,
select{
    width:100%;
    padding:10px;
    border:1px solid #90caf9;
    border-radius:6px;
    outline:none;
    font-size:15px;
}

input:focus,
select:focus{
    border-color:#2196f3;
    box-shadow:0 0 5px rgba(33,150,243,.3);
}

.btn{
    width:100%;
    padding:12px;
    margin-top:25px;
    border:none;
    border-radius:6px;
    background:#42a5f5;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:.3s;
}

.btn:hover{
    background:#1e88e5;
}

.back{
    display:block;
    text-align:center;
    margin-top:15px;
    text-decoration:none;
    color:#2196f3;
    font-weight:bold;
}

.back:hover{
    text-decoration:underline;
}
</style>

</head>
<body>

<div class="container">

<div class="card">

<h2>เพิ่มรายการจอง</h2>

<form action="action/insert_order.php" method="post">

<label>ชื่อผู้เข้าพัก</label>
<input type="text" name="name" required>

<label>ชำระเงิน</label>
<input type="text" name="payment" required>

<label>ประเภท</label>
<input type="text" name="usage_type" required>

<label>ภาพ</label>
<input type="text" name="image" required>

<?php
include "action/connect.php";

$sql = "SELECT * FROM rooms";
$result = mysqli_query($con,$sql);
?>

<label>เลือกห้องพัก</label>

<select name="room_id">

<?php
foreach($result as $room){
?>

<option value="<?= $room["room_id"] ?>">
<?= $room["room_id"] ?> - <?= number_format($room["price"]) ?> บาท
</option>

<?php
}
?>

</select>

<button class="btn">
บันทึกข้อมูล
</button>

</form>

<a href="index.php" class="back">
กลับหน้าหลัก
</a>

</div>

</div>

</body>
</html>