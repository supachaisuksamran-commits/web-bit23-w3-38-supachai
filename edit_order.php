<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลการจอง</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 15px;
        }

        .container {
            width: 100%;
            max-width: 550px;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 38px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #444;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            background: white;
            transition: 0.3s;
        }

        input:focus,
        select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .button {
            flex: 1;
            padding: 13px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
        }

        .save-button {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .save-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(102, 126, 234, 0.4);
        }

        .cancel-button {
            background: #eee;
            color: #555;
        }

        .cancel-button:hover {
            background: #ddd;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            color: #999;
            font-size: 13px;
        }

        @media (max-width: 500px) {
            .card {
                padding: 30px 20px;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<?php
    $id = $_GET["id"];

    include "action/connect.php";

    $sql = "SELECT * FROM orders WHERE order_id = '$id'";
    $result = mysqli_query($con, $sql);

    $order = mysqli_fetch_assoc($result);

    $sql = "SELECT * FROM rooms";
    $result = mysqli_query($con, $sql);
?>

<div class="container">
    <div class="card">

        <div class="icon">
            🏨
        </div>

        <h1>แก้ไขข้อมูลการจอง</h1>

        <p class="subtitle">
            แก้ไขรายละเอียดข้อมูลผู้เข้าพัก
        </p>

        <form action="action/update_order.php" method="post">

            <div class="form-group">
                <label for="name">ชื่อผู้เข้าพัก</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="<?= htmlspecialchars($order["name"]) ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="payment">ชำระเงิน</label>
                <input
                    type="text"
                    id="payment"
                    name="payment"
                    value="<?= htmlspecialchars($order["payment"]) ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="usage_type">ประเภท</label>
                <input
                    type="text"
                    id="usage_type"
                    name="usage_type"
                    value="<?= htmlspecialchars($order["usage_type"]) ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="image">ภาพ</label>
                <input
                    type="text"
                    id="image"
                    name="image"
                    value="<?= htmlspecialchars($order["image"]) ?>"
                >
            </div>

            <div class="form-group">
                <label for="room_id">เลือกห้องพัก</label>

                <select name="room_id" id="room_id" required>

                    <?php foreach ($result as $room) { ?>

                        <option
                            value="<?= $room["room_id"] ?>"
                            <?= $order["room_id"] == $room["room_id"] ? 'selected' : '' ?>
                        >
                            <?= $room["room_id"] . " - " . $room["price"] . " บาท" ?>
                        </option>

                    <?php } ?>

                </select>
            </div>

            <input
                type="hidden"
                name="order_id"
                value="<?= $order["order_id"] ?>"
            >

            <div class="button-group">
                <button type="submit" class="button save-button">
                     บันทึกข้อมูล
                </button>

                <a href="index.php" class="button cancel-button">
                    ยกเลิก
                </a>
            </div>

        </form>

        <div class="footer">
            © 2026 My Hotel
        </div>

    </div>
</div>

</body>
</html>
