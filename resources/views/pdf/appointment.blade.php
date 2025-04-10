<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Appointment Summary</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f4f8;
            padding: 40px;
            color: #333;
        }

        .receipt-container {
            max-width: 720px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h2 {
            color: #2c3e50;
            margin: 10px 0;
        }

        .doctor-section {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .doctor-photo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }

        .doctor-info {
            flex-grow: 1;
        }

        .doctor-info h3 {
            margin: 0;
            font-size: 18px;
            color: #2c3e50;
        }

        .doctor-info p {
            margin: 4px 0;
            color: #777;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            text-align: left;
            padding: 12px 10px;
            font-size: 14px;
        }

        th {
            color: #555;
            width: 40%;
        }

        td {
            color: #000;
        }

        .status-pill {
            display: inline-block;
            padding: 6px 14px;
            background-color: #28a745;
            color: white;
            border-radius: 20px;
            font-size: 13px;
        }

        .footer {
            text-align: center;
            color: #888;
            font-size: 13px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="header">
            <h2>Appointment Confirmed</h2>
        </div>

        <div class="doctor-section">
            <div class="doctor-info">
                <h3>{{ $appointment['doctor'] }}</h3>
                <p>{{ $appointment['speciality'] }}</p>
            </div>
        </div>

        <table>
            <tr>
                <th>Appointment ID</th>
                <td>{{ $appointment['id'] }}</td>
            </tr>
            <tr>
                <th>Date & Time</th>
                <td>{{ $appointment['date'] }}</td>
            </tr>
            <tr>
                <th>Patient</th>
                <td>{{ $appointment['patient'] }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $appointment['phone'] }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $appointment['gender'] }}</td>
            </tr>
            <tr>
                <th>Fee</th>
                <td>₹{{ $appointment['fee'] }}</td>
            </tr>
            <tr>
                <th>Location</th>
                <td>{{ $appointment['location'] }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td><span class="status-pill">Confirmed</span></td>
            </tr>
        </table>

        <div class="footer">
            A confirmation has been sent to your email and phone number.<br>
            Please arrive 15 minutes before your scheduled appointment.
        </div>
    </div>
</body>
</html>
