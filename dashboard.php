<?php
$conn = mysqli_connect("localhost", "root", "", "climate_db");

$result = mysqli_query($conn, "SELECT * FROM climate_data ORDER BY id DESC LIMIT 1");

$data = mysqli_fetch_assoc($result);

$temp = $data['temperature'] ?? 0;
$hum  = $data['humidity'] ?? 0;

$tempPercent = ($temp / 50) * 100;
$humPercent  = $hum;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Live Sensor</title>
    <meta http-equiv="refresh" content="2">

    <style>
        body{
            font-family: Arial;
            background: #0f172a;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card{
            background: #1e293b;
            padding: 30px;
            border-radius: 15px;
            width: 350px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }

        .label{
            margin: 15px 0 5px;
        }

        .bar-box{             cvnccccccccccccccccc
            background: #334155;
            border-radius: 20px;
            overflow: hidden;
        }

        .bar{
            height: 25px;
            line-height: 25px;
            color: white;
            font-weight: bold;
            border-radius: 20px;
            transition: width 1s ease-in-out;
        }

        .temp{
            background: linear-gradient(to right, #ff4d4d, #ff0000);
        }

        .hum{
            background: linear-gradient(to right, #38bdf8, #0ea5e9);
        }
    </style>
</head>

<body>

<div class="card">
    <h2>🌡️ Live Sensor</h2>

    <div class="label">Temperature: <?php echo $temp; ?>°C</div>
    <div class="bar-box">
        <div class="bar temp" style="width: <?php echo $tempPercent; ?>%">
            <?php echo $temp; ?>°C
        </div>
    </div>

    <div class="label">Humidity: <?php echo $hum; ?>%</div>
    <div class="bar-box">
        <div class="bar hum" style="width: <?php echo $humPercent; ?>%">
            <?php echo $hum; ?>%
        </div>
    </div>

</div>

</body>
</html>