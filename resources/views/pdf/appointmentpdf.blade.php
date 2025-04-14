<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Appointments</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Appointments List</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Patient Id</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $index => $appointment)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $appointment->patient_id }}</td>
                    <td>{{ $appointment->patient->name }}</td>
                    <td>{{ $appointment->doctor->user->name ?? 'N/A' }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ ucfirst($appointment->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
