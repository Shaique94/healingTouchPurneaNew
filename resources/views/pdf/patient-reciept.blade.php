<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Appointment Summary</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            color: #333;
        }
        .header {
            text-align: center;
            padding-bottom: 10px;
            border-bottom: 2px solid #ddd;
            margin-bottom: 20px;
        }
        .section-title {
            background-color: #f3f4f6;
            padding: 8px;
            font-weight: bold;
            border-radius: 4px;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .table td {
            padding: 6px 10px;
            border-bottom: 1px solid #eee;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Appointment Summary</h2>
        <p>{{ now()->format('d M Y, h:i A') }}</p>
    </div>

    {{-- Patient Details --}}
    <div class="section-title">Patient Details</div>
    <table class="table">
        <tr>
            <td><strong>Name:</strong></td>
            <td>{{ $patient->name }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $patient->email ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Phone:</strong></td>
            <td>{{ $patient->phone }}</td>
        </tr>
        <tr>
            <td><strong>Date of Birth:</strong></td>
            <td>{{ $patient->dob ? \Carbon\Carbon::parse($patient->dob)->format('d M Y') : 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Gender:</strong></td>
            <td>{{ ucfirst($patient->gender) }}</td>
        </tr>
        <tr>
            <td><strong>Address:</strong></td>
            <td>
                {{ $patient->address }},
                {{ $patient->city }},
                {{ $patient->state }},
                {{ $patient->country }},
                {{ $patient->pincode }}
            </td>
        </tr>
    </table>

    {{-- Doctor Details --}}
    <div class="section-title">Doctor Details</div>
    <table class="table">
        <tr>
            <td><strong>Name:</strong></td>
            <td>{{ $appointment->doctor->name }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $appointment->doctor->email }}</td>
        </tr>
        <tr>
            <td><strong>Specialization:</strong></td>
            <td>{{ $appointment->doctor->doctor->specialization ?? 'N/A' }}</td>
        </tr>
    </table>

    {{-- Appointment Details --}}
    <div class="section-title">Appointment Details</div>
    <table class="table">
        <tr>
            <td><strong>Appointment Date:</strong></td>
            <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
        </tr>
        <tr>
            <td><strong>Time:</strong></td>
            <td>{{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}</td>
        </tr>
        <tr>
            <td><strong>Status:</strong></td>
            <td>{{ ucfirst($appointment->status) }}</td>
        </tr>
        <tr>
            <td><strong>Payment Method:</strong></td>
            <td>{{ ucfirst($appointment->payment_method ?? 'N/A') }}</td>
        </tr>
        <tr>
            <td><strong>Notes:</strong></td>
            <td>{{ $appointment->notes ?? 'None' }}</td>
        </tr>
    </table>

    <div class="footer">
        &copy; {{ date('Y') }} Your Hospital Name. All rights reserved.
    </div>

</body>
</html>
