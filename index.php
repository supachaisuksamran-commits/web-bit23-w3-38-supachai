<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลการจองห้อง</title>

    <style>
        body{
            margin:0;
            padding:30px;
            background:#eef7ff;
            font-family:Tahoma,sans-serif;
        }

        h2{
            text-align:center;
            color:#0b6fc2;
            margin-bottom:20px;
        }

        table{
            width:95%;
            margin:auto;
            border-collapse:collapse;
            background:#ffffff;
            box-shadow:0 0 8px rgba(0,0,0,0.1);
        }

        th{
            background:#4aa8ff;
            color:white;
            padding:12px;
            font-size:16px;
        }

        td{
            padding:10px;
            text-align:center;
            border:1px solid #cfe7ff;
        }

        tr:nth-child(even){
            background:#f4fbff;
        }

        tr:hover{
            background:#dff1ff;
        }

        img{
            width:180px;
            border-radius:8px;
            border:2px solid #4aa8ff;
        }
    </style>

</head>
<body>

<?php
    include "action/connect.php";

    $sql = "SELECT * FROM orders";
    $result = mysqli_query($con,$sql);
?>

<h2>ข้อมูลการจองห้องพัก</h2>

<table>
    <thead>
        <tr>
            <th>รหัสรายการ</th>
            <th>ชื่อผู้เข้าพัก</th>
            <th>ชำระเงิน</th>
            <th>ประเภท</th>
            <th>ห้อง</th>
            <th>รูปภาพ</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach($result as $order){ ?>
        <tr>
            <td><?= $order["order_id"] ?></td>
            <td><?= $order["name"] ?></td>
            <td><?= $order["payment"] ?></td>
            <td><?= $order["usage_type"] ?></td>
            <td><?= $order["room_id"] ?></td>
            <td>
                <img src="<?= $order["image"] ?>">
            </td>
        </tr>
    <?php } ?>
    </tbody>

</table>
<a href="room.php">ห้อง</a>
</body>
</html>