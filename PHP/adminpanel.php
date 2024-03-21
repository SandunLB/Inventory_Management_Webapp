<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url('Logo.jpeg') center center fixed;
            background-size: cover;
        }

        .container {
            width: 80%;
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.1); /* Glass effect background */
            backdrop-filter: blur(10px); /* Glass effect blur */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .btn-group button {
            margin-bottom: 15px;
            width: 100%;
            padding: 15px;
            cursor: pointer;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn-group button:hover {
            filter: brightness(110%);
        }
        .btn-group2 button {
            margin-bottom: 15px;
            width: 100%;
            padding: 15px;
            cursor: pointer;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn-group2 button:hover {
            filter: brightness(110%);
        }

        .digital-clock {
            font-size: 3em;
            color: #333;
            margin-bottom: 20px;
        }

        .date {
            color: #666;
            margin-bottom: 40px;
        }

        .category-button {
            margin: 10px;
            padding: 10px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
            font-size: 1.2em;
            width: 150px;
        }

        .category-button.software {
            background-color: #3498db;
            color: #fff;
        }

        .category-button.equipment {
            background-color: #e74c3c;
            color: #fff;
        }

        .category-button:hover {
            filter: brightness(110%);
        }

        .subcategory {
            display: none;
        }

        .subcategory.active {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 0.8em;
            color: #777;
            background-color: #f5f5f5;
            padding: 10px;
            box-shadow: 0px -2px 5px 0px rgba(0, 0, 0, 0.1);
        }

        .footer button {
            margin-top: 1px;
            padding: 1px;
            cursor: pointer;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .footer button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Welcome to the Admin Panel, <?php echo $_SESSION['admin']; ?>!</h2>

    <div class="digital-clock" id="digital-clock"></div>
    <div class="date" id="date"></div>

    <button class="category-button software" onclick="showSubcategory('computer-software')">Software</button>
    <button class="category-button equipment" onclick="showSubcategory('computer-equipment')">Equipment</button>

    <div class="subcategory" id="computer-software">
        <h2>Computer Software</h2>
        <div class="btn-group">
            <button onclick="window.location.href='csadd.php'">Add data</button>
            <button onclick="window.location.href='csupdate.php'">Update data</button>
            <button onclick="window.location.href='csdisplay.php'">Display data</button>
            <button onclick="window.location.href='alldatacs.php'">View All data</button>
        </div>
    </div>

    <div class="subcategory" id="computer-equipment">
        <h2>Computer Equipment</h2>
        <div class="btn-group2">
            <button onclick="window.location.href='ceadd.php'">Add data</button>
            <button onclick="window.location.href='ceupdate.php'">Update data</button>
            <button onclick="window.location.href='csdisplay.php'">Display data</button>
            <button onclick="window.location.href='alldatace.php'">View All data</button>
        </div>
    </div>
</div>

<div class="footer">
    <button onclick="window.location.href='password.php'">Change Admin Password</button>
    <br>
    <br>
    <button onclick="window.location.href='../index.php'">Logout</button>

    <p>&copy; 2024 Marsylka</p>
</div>

<script>
    // Function to update the digital clock
    function updateDigitalClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        // Add leading zeros if needed
        hours = (hours < 10) ? '0' + hours : hours;
        minutes = (minutes < 10) ? '0' + minutes : minutes;
        seconds = (seconds < 10) ? '0' + seconds : seconds;

        var digitalClock = document.getElementById('digital-clock');
        digitalClock.innerHTML = hours + ':' + minutes + ':' + seconds;
    }

    // Function to update the date
    function updateDate() {
        var now = new Date();
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var dateElement = document.getElementById('date');
        dateElement.innerHTML = now.toLocaleDateString('en-US', options);
    }

    // Update the clock and date every second
    setInterval(function() {
        updateDigitalClock();
        updateDate();
    }, 1000);

    // Call the functions to initialize the clock and date
    updateDigitalClock();
    updateDate();

    // New JavaScript code for showing subcategories
    function showSubcategory(subcategory) {
        var subcategoryElement = document.getElementById(subcategory);
        var allSubcategories = document.querySelectorAll('.subcategory');

        allSubcategories.forEach(function (element) {
            element.classList.remove('active');
        });

        subcategoryElement.classList.add('active');
    }
</script>
<!-- Add the footer -->


</body>
</html>
