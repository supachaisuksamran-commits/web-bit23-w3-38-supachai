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

    $sql = "SELECT * FROM rooms";
    $result = mysqli_query($con,$sql);
?>

<h2>ข้อมูลการจองห้องพัก</h2>

<table>
    <thead>
        <tr>
            <th>ห้อง</th>
            <th>บุหรี่</th>
            <th>อ่าง</th>
            <th>ราคา</th>
           
        </tr>
    </thead>

    <tbody>
    <?php foreach($result as $room){ ?>
        <tr>
            <td><?= $room["room_id"] ?></td>
            <td><?= $room["smoke"] ?></td>
            <td><?= $room["bathtub"] ?></td>
            <td><?= $room["price"] ?></td>
            
            
        </tr>
    <?php } ?>
    </tbody>

</table>
<a href="index.php"> การจอง</a>
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