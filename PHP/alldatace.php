<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('PHP/Logo.jpeg') center center fixed;
            background-size: cover;
        }

        .header {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 10px;
            text-align: center;
        }

        .container {
            max-width: auto;
            margin: 50px auto;
            background-color: #ecf0f1;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .tables {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
            
        }

        a {
    text-decoration: none;
    color: #000;
    font-weight: bold;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s, border 0.3s;
    border: 2px solid #000; 
    display: inline-block; 
}
    .L{ 
        color: #fff;
    }

        a:hover {
            background-color: #078bea;
        }

        .table-container {
            overflow-x: auto;
            
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            transition: box-shadow 0.3s;
            
        }

        th, td {
            border: 1px solid #bdc3c7;
            padding: 10px;
            text-align: left;
            transition: background-color 0.2s;
        }

        th {
            background-color: #3498db;
            color: #000;
            font-size: 14px;
        }

        td {
            background-color: #ecf0f1;
            font-size: 13px;
        }

        .highlight {
            background-color: #e74c3c;
            color: #ecf0f1;
        }

        table:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        th:hover, td:hover {
            background-color: rgba(0, 114, 255, 0.53);
        }

        
        @media (max-width: 600px) {
            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<div class="container">

   

    
       
        <?php include 'displayallequipment.php'; ?>
   



</body>
</html>
