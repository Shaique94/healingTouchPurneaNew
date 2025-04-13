<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Appointment Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #0284c7;
            padding-bottom: 10px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #0284c7;
        }
        h1 {
            font-size: 18px;
            margin-bottom: 20px;
            color: #0284c7;
        }
        .receipt-id {
            font-size: 14px;
            margin-bottom: 20px;
            text-align: right;
            color: #666;
        }
        .info-box {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .info-title {
            font-weight: bold;
            margin-bottom: 10px;
            color: #0284c7;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        .info-row {
            margin-bottom: 8px;
            display: flex;
        }
        .info-label {
            width: 150px;
            font-weight: bold;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .note {
            background-color: #f3f9fd;
            padding: 10px;
            border-radius: 5px;
            font-size: 12px;
            margin-top: 20px;
        }
        .barcode {
            text-align: center;
            margin: 20px 0;
        }
        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }
        .status-confirmed {
            background-color: #d1fae5;
            color: #047857;
        }
        .status-pending {
            background-color: #e0f2fe;
            color: #0369a1;
        }
        .status-cancelled {
            background-color: #fee2e2;
            color: #b91c1c;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">{{ $hospital_name }}</div>
            <div>{{ $hospital_address }}</div>
            <div>{{ $hospital_contact }}</div>
        </div>
        
        <h1>APPOINTMENT RECEIPT</h1>
        
        <div class="receipt-id">
            <div>Reference ID: {{ $reference }}</div>
            <div>Date: {{ date('d M Y') }}</div>
        </div>
        
        <div class="info-grid">
            <div class="info-box">
                <div class="info-title">Patient Details</div>
                <div class="info-row">
                    <div class="info-label">Name:</div>
                    <div>{{ $appointment->patient->name }}</div>
                </div>
                @if($appointment->patient->email)
                <div class="info-row">
                    <div class="info-label">Email:</div>
                    <div>{{ $appointment->patient->email }}</div>
                </div>
                @endif
                <div class="info-row">
                    <div class="info-label">Phone:</div>
                    <div>{{ $appointment->patient->phone }}</div>
                </div>
                @if($appointment->patient->gender)
                <div class="info-row">
                    <div class="info-label">Gender:</div>
                    <div>{{ ucfirst($appointment->patient->gender) }}</div>
                </div>
                @endif
            </div>
            
            <div class="info-box">
                <div class="info-title">Appointment Details</div>
                <div class="info-row">
                    <div class="info-label">Doctor:</div>
                    <div>Dr. {{ $appointment->doctor->user->name }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Department:</div>
                    <div>{{ $appointment->doctor->department->name }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Date:</div>
                    <div>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Time:</div>
                    <div>{{ $appointment->appointment_time }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Status:</div>
                    <div>
                        @if($appointment->status === 'checked_in')
                            <span class="status status-confirmed">Payment Received</span>
                        @elseif($appointment->status === 'cancelled')
                            <span class="status status-cancelled">Cancelled</span>
                        @else
                            <span class="status status-pending">Scheduled</span>
                        @endif
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-label">Fee:</div>
                    <div>₹500</div>
                </div>
            </div>
        </div>
        
        @if($appointment->notes)
        <div class="info-box">
            <div class="info-title">Notes</div>
            <p>{{ $appointment->notes }}</p>
        </div>
        @endif
        
        <div class="note">
            <strong>Important:</strong> Please arrive 15 minutes before your scheduled appointment time. Bring this receipt and any previous medical records for reference.
        </div>
        
        <div class="barcode">
            *{{ $reference }}*
        </div>
        
        <div class="footer">
            <p>Thank you for choosing {{ $hospital_name }}. We look forward to providing you with excellent healthcare services.</p>
            <p>This is a computer-generated document. No signature is required.</p>
        </div>
    </div>
</body>
</html>
