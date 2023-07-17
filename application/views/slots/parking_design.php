<!DOCTYPE html>
<html>

<head>
    <title>Parking Slot Map</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
            background-image: url('https://e0.pxfuel.com/wallpapers/347/606/desktop-wallpaper-abstract-background-design-light-best-background-for-brochure.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            display: flex;
            height: 100vh;
            border: 5px solid #fff;
            overflow: hidden;
        }

        .left-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-right: 5px solid #fff;
            padding: 50px;
        }

        .left-section h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #000080;
        }

        .left-section p {
            font-size: 16px;
            margin-top: 10px;
        }

        .left-section img {
            max-width: 100%;
            margin-bottom: 20px;
        }

        .right-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 50px;
        }

        .right-section-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .parking-slot-container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .parking-slot {
            background-color: rgba(255, 255, 255, 0.7);
            border: 2px solid rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            padding: 20px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
        }

        .parking-slot:hover {
            background-color: rgba(255, 255, 255, 0.9);
        }

        .parking-slot.available {
            background-color: rgba(0, 255, 0, 0.7);
            border-color: rgba(0, 255, 0, 0.9);
        }

        .parking-slot.occupied {
            background-color: rgba(255, 0, 0, 0.7);
            border-color: rgba(255, 0, 0, 0.9);
        }

        .parking-slot-label {
            margin-top: 10px;
        }

        /* Add gray color to slots 2, 3, 5, and 6 */
        .right-section .parking-slot:nth-child(2),
        .right-section .parking-slot:nth-child(3),
        .right-section .parking-slot:nth-child(5),
        .right-section .parking-slot:nth-child(6) {
            background-color: rgba(128, 128, 128, 0.7);
            border-color: rgba(128, 128, 128, 0.9);
        }

        /* Adjust the positioning of the slots */
        .right-section .right-section-row:nth-child(1) {
            margin-bottom: 20px;
        }

        .basement-label {
            position: absolute;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 18px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            z-index: 2;
        }

        .nearest-slot-message {
            padding: 10px;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            border: 2px solid #000;
            background-color: #000080;
            color: #fff;
            margin-bottom: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
        }

        .nearest-slot-message-frame {
            padding: 5px;
            border: 2px solid #000;
            display: inline-block;
            background-color: #6495ED;
        }

        .button {
            background-color: #000080;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            height: 15px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #3475a6;
        }
    </style>
</head>

<body>
    <?php
    $slot_1 = false;
    $slot_2 = false;
    $slot = $this->model_slots->getAllSlots()[0];

    if ($slot['UltrasonicSensorReading1'] == '2') {
        $slot_1 = true;
        if ($slot['UltrasonicSensorReading1'] == '3') {
            $slot_1 = false;
        }
    }

    if ($slot['UltrasonicSensorReading2'] == '4') {
        $slot_2 = true;
        if ($slot['UltrasonicSensorReading2'] == '5') {
            $slot_2 = false;
        }
    }

    if ($slot_1 == false && $slot_2 == false) {
        $availableSlots = 2;
    } elseif ($slot_1 == true && $slot_2 == false) {
        $availableSlots = 1;
    }elseif ($slot_1 == false && $slot_2 == true) {
        $availableSlots = 1;
    }elseif ($slot_1 == true && $slot_2 == true) {
        $availableSlots = 0;
    }

    $nearestSlot = '';

    if ($slot_1 == false) {
        $nearestSlot = "The nearest available parking slot is in = BASEMENT 1";
    } elseif ($slot_1 == true && $slot_2 == false) {
        $nearestSlot = "The nearest available parking slot is in = BASEMENT 2";
    } elseif ($slot_1 == true && $slot_2 == true) {
        $nearestSlot = "No parking lot is available right now";
    }


    ?>
    <div class="container">
        <a href="<?= base_url('index.php/dashboard') ?>" class="button">Home</a>
        <div class="left-section">
            <h2>Welcome</h2>
            <img src="https://img.freepik.com/premium-vector/parking-space-icon-where-you-can-park-your-car-flat-vector-illustration-isolated-white-background_124715-1477.jpg?w=2000" alt="Additional Image">
            <h2>Available Parking Slots: <?php echo $availableSlots; ?></h2>
        </div>

        <div class="right-section">
            <p>
                <span class="nearest-slot-message">
                    <?php echo $nearestSlot; ?>
                </span>
            </p>
            <div class="right-section-row">
                <div class="parking-slot-container">
                    <div class="parking-slot <?= $slot_2 ? 'occupied' : 'available' ?>">
                        Slot 4
                        <span class="parking-slot-label">B2-01</span>
                    </div>
                </div>
                <div class="parking-slot available">
                    Slot 5
                    <span class="parking-slot-label">B2-02</span>
                </div>
                <div class="parking-slot available">
                    Slot 6
                    <span class="parking-slot-label">B2-03</span>
                </div>
            </div>
            <div style="color:black;">
                <center>
                    <span>BASEMENT 2</span>
                </center>
            </div>
            <div class="right-section-row">
                <div class="parking-slot-container">
                    <div class="parking-slot <?= $slot_1 ? 'occupied' : 'available' ?>">
                        Slot 1
                        <span class="parking-slot-label">B1-01</span>
                    </div>
                </div>
                <div class="parking-slot available">
                    Slot 2
                    <span class="parking-slot-label">B1-02</span>
                </div>
                <div class="parking-slot available">
                    Slot 3
                    <span class="parking-slot-label">B1-03</span>
                </div>
            </div>
            <div style="color:black;">
                <center>
                    <span>BASEMENT 1</span>
                </center>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            location.reload();
        }, 5000);
    </script>
</body>

</html>