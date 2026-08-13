<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>รายการจองห้องพัก</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Tahoma,sans-serif;
}

body{
    background:#eef7ff;
    padding:30px;
}

.container{
    max-width:1200px;
    margin:auto;
}

h1{
    color:#1e88e5;
    margin-bottom:20px;
}

.top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.btn-add{
    text-decoration:none;
    background:#42a5f5;
    color:white;
    padding:10px 18px;
    border-radius:6px;
    transition:.3s;
}

.btn-add:hover{
    background:#1e88e5;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
}

thead{
    background:#64b5f6;
    color:white;
}

th,td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:nth-child(even){
    background:#f8fcff;
}

tr:hover{
    background:#e3f2fd;
}

img{
    width:140px;
    height:90px;
    object-fit:cover;
    border-radius:8px;
    border:2px solid #90caf9;
}

.btn-edit{
    background:#29b6f6;
    color:white;
    padding:6px 12px;
    text-decoration:none;
    border-radius:5px;
    margin-right:5px;
}

.btn-delete{
    background:#ef5350;
    color:white;
    padding:6px 12px;
    text-decoration:none;
    border-radius:5px;
}

.btn-edit:hover{
    background:#0288d1;
}

.btn-delete:hover{
    background:#d32f2f;
}

.navbar{
            background:#0b6fc2;
            margin:-30px -30px 30px -30px;
        }

        .navbar ul{
            list-style:none;
            margin:0;
            padding:0;
            display:flex;
            justify-content:center;
        }

        .navbar li{
            margin:0;
        }

        .navbar a{
            display:block;
            padding:16px 30px;
            color:white;
            text-decoration:none;
            font-size:16px;
        }

        .navbar a:hover{
            background:#4aa8ff;
        }
</style>

</head>
<body>
<nav class="navbar">
    <ul>
        <li><a href="index.php">ประวัติ</a></li>
        <li><a href="manage_order.php">แก้ไขการจอง</a></li>
        <li><a href="room.php">ห้อง</a></li>
    </ul>
</nav>
<?php
include "action/connect.php";

$sql = "SELECT * FROM orders";
$result = mysqli_query($con,$sql);
?>

<div class="container">

<div class="top">
    <h1>รายการจองห้องพัก</h1>
    <a href="add_order.php" class="btn-add">+ เพิ่มรายการ</a>
</div>

<table>

<thead>
<tr>
<th>รหัสรายการ</th>
<th>ชื่อผู้เข้าพัก</th>
<th>ชำระเงิน</th>
<th>ประเภท</th>
<th>ห้อง</th>
<th>รูปภาพ</th>
<th>จัดการ</th>
</tr>
</thead>

<tbody>

<?php
foreach($result as $order){
?>

<tr>

<td><?= $order["order_id"] ?></td>

<td><?= $order["name"] ?></td>

<td><?= $order["payment"] ?></td>

<td><?= $order["usage_type"] ?></td>

<td><?= $order["room_id"] ?></td>

<td>
<img src="<?= $order["image"] ?>">
</td>

<td>
<a class="btn-edit"
href="edit_order.php?id=<?= $order["order_id"] ?>">
แก้ไข
</a>

<a class="btn-delete"
href="action/delete_order.php?id=<?= $order["order_id"] ?>"
onclick="return confirm('ต้องการลบข้อมูลนี้หรือไม่?')">
ลบ
</a>
</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>
<footer style="
    margin-top:30px;
    padding:20px;
    background:#0b6fc2;
    color:white;
    text-align:center;
    font-size:16px;
">
    ศุภชัย สุขสำราญ BIT.2/3 NO.38
</footer>

</body>
</html>