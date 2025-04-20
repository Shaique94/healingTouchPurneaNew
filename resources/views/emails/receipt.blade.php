<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tomorrow's Appointments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fff;
        }
        .header {
            font-size: 22px;
            font-weight: bold;
            color: #1a5f7a;
            margin-bottom: 15px;
        }
        .doctor-info {
            margin: 15px 0;
            padding: 10px;
            background-color: #f5f5f5;
        }
        .doctor-info p {
            margin: 8px 0;
        }
        .appointments-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .appointments-table th, .appointments-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .appointments-table th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="header">
        Tomorrow's Appointments -Dr. {{ $doctor_name }}
    </div>
    
    <div class="doctor-info">
        <p><strong>Doctor's Name:</strong>Dr. {{ $doctor_name }}</p>
        <p><strong>Date:</strong> {{ $date }}</p>
    </div>
    
    <h3>Please find the list of appointments attached below with this mail</h3>
</body>
</html>