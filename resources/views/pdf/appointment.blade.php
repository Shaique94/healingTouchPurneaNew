<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            padding: 10px;
            font-size: 12px;
            line-height: 1.3;
        }
        .box {
            border: 1px solid #000;
            margin: 0 auto;
            max-width: 700px;
        }
        .header {
            padding: 10px;
            border-bottom: 2px solid #1a5f7a;
            background: #f8f9fa;
            text-align: center;
            position: relative;
        }
        .logo {
            width: 70px;
            height: 70px;
            border: 2px solid #1a5f7a;
            border-radius: 50%;
            padding: 2px;
            margin: 0 auto 5px;
            display: block;
            object-fit: cover;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .hospital-title {
            text-align: center;
            margin-bottom: 5px;
        }
        .hospital-title h3 {
            color: #1a5f7a;
            font-size: 20px;
            font-weight: bold;
            margin: 0 0 2px 0;
            line-height: 1.2;
        }
        .tagline {
            color: #666;
            font-size: 12px;
            margin-bottom: 10px;
        }
        .appointment-status {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #e8f5e9;
            color: #2e7d32;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: bold;
            border: 1px solid #c8e6c9;
        }
        .content-table {
            width: 100%;
            border-collapse: collapse;
        }
        .content-cell {
            width: 50%;
            padding: 10px;
            vertical-align: top;
        }
        .border-right {
            border-right: 1px solid #000;
        }
        .info-group {
            margin-bottom: 8px;
        }
        .label {
            color: #666;
            font-size: 11px;
            margin-bottom: 1px;
        }
        .value {
            font-weight: bold;
        }
        .footer {
            border-top: 1px solid #000;
            padding: 8px 10px;
            background: #f8f8f8;
            font-size: 11px;
        }
        .instructions {
            border-top: 1px solid #000;
            padding: 10px;
        }
        ul {
            margin: 5px 0;
            padding-left: 20px;
        }
        h3 {
            margin: 0 0 10px 0;
            font-size: 16px;
        }
        .highlighted-date {
            background: #f8f9fa;
            border: 2px solid #1a5f7a;
            color: #1a5f7a;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: bold;
            display: block;
            margin: 5px 0;
            text-align: center;
        }
        .date-box {
            font-size: 16px;
            margin-bottom: 2px;
        }
        .day-name {
            font-size: 12px;
            color: #666;
            font-weight: normal;
        }
        .time-box {
            background: #1a5f7a;
            color: white;
            padding: 4px 10px;
            border-radius: 4px;
            display: inline-block;
            font-size: 14px;
            margin-top: 5px;
        }
        .day-highlight {
            color: #1a5f7a;
            font-weight: bold;
        }
        .date-time-container {
            margin-top: 8px;
        }
        .schedule-item {
            margin-bottom: 5px;
            color: #1a5f7a;
        }
        .schedule-label {
            text-transform: uppercase;
            font-size: 11px;
            color: #666;
            margin-bottom: 2px;
        }
        .schedule-value {
            font-size: 14px;
            font-weight: bold;
        }
        .time-value {
            color: #1976d2;
            font-weight: bold;
        }
        .day-value {
            color: #2e7d32;
        }
        .box-label {
            font-size: 10px;
            text-transform: uppercase;
            margin-bottom: 3px;
            opacity: 0.8;
        }
        .box-value {
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="header">
            <div class="appointment-status">✓ Confirmed</div>
            <img src="{{ public_path('healingTouchLogo.jpeg') }}" class="logo" alt="Logo">
            <div class="hospital-title">
                <h3>HealingTouch Hospital</h3>
                <div class="tagline">Excellence in Healthcare</div>
            </div>
            <div class="label" style="color: #666;">Appointment Ref.</div>
            <div class="number" style="color: #1a5f7a; font-weight: bold; font-size: 18px;">
                HTH-{{ str_pad($appointment->id, 6, '0', STR_PAD_LEFT) }}
            </div>
        </div>

        <table class="content-table">
            <tr>
                <td class="content-cell border-right">
                    <h3>Patient Information</h3>
                    <div class="info-group">
                        <div class="label">Full Name</div>
                        <div class="value">{{ $appointment->patient->name }}</div>
                    </div>
                    <div class="info-group">
                        <div class="label">Patient ID</div>
                        <div class="value">#{{ $appointment->patient->id }}</div>
                    </div>
                    <div class="info-group">
                        <div class="label">Gender</div>
                        <div class="value">{{ ucfirst($appointment->patient->gender) }}</div>
                    </div>
                    <div class="info-group">
                        <div class="label">Contact</div>
                        <div class="value">{{ $appointment->patient->phone }}</div>
                    </div>
                </td>
                <td class="content-cell">
                    <h3>Appointment Details</h3>
                    <div class="info-group">
                        <div class="label">Doctor</div>
                        <div class="value">{{ $appointment->doctor->user->name }}</div>
                    </div>
                    <div class="info-group">
                        <div class="label">Department</div>
                        <div class="value">{{ $appointment->doctor->department->name }}</div>
                    </div>
                    <div class="info-group">
                        <div class="label">Consultation Fee</div>
                        <div class="value">₹{{ number_format($appointment->doctor->fee ?? 0, 2) }}</div>
                    </div>
                    <div class="info-group">
                        <div class="label">Appointment Schedule</div>
                        <div class="date-time-container">
                            <div class="schedule-item">
                                <div class="schedule-label">Date</div>
                                <div class="schedule-value">
                                    {{ Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}
                                </div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-label">Day</div>
                                <div class="schedule-value day-value">
                                    {{ Carbon\Carbon::parse($appointment->appointment_date)->format('l') }}
                                </div>
                            </div>
                            <div class="schedule-item">
                                <div class="schedule-label">Time</div>
                                <div class="schedule-value time-value">
                                    {{ Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-group">
                        <div class="label">Queue Number</div>
                        <div class="value">#{{ str_pad($appointment->queue_number ?? 1, 3, '0', STR_PAD_LEFT) }}</div>
                    </div>
                </td>
            </tr>
        </table>

        <div class="instructions">
            <h3>Important Instructions</h3>
            <ul>
                <li>Please arrive 15 minutes before your scheduled appointment time</li>
                <li>Bring this appointment slip or Pdf</li>
                <li>Carry all relevant medical records and reports</li>
                <li>For rescheduling, contact 24 hours in advance</li>
            </ul>
        </div>

        <div class="footer">
            <strong>Contact:</strong> +91 9471659700 | 
            <strong>Address:</strong> Hope Chauraha, Rambagh Road, Linebazar, Purnea 854301
        </div>
    </div>
</body>
</html>
