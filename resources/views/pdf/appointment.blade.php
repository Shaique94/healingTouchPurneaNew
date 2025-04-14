<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedCare Hospital Appointment</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #ffffff;
        margin: 0 auto;
        padding: 0;
        width: 100%;
        max-width: 600px;
    }

    .card {
        width: 100%;
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        margin: 10px auto;
        box-sizing: border-box;
        padding: 0;
        box-shadow: none;
        position: relative;
    }

    .card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 6px;
        width: 100%;
        background: linear-gradient(90deg, #0066ff, #00a3ff);
    }

    .header {
        text-align: center;
        margin-bottom: 15px;
        padding: 15px 10px 10px;
        border-bottom: 1px solid #eaeaea;
        background: #f9fbff;
        position: relative;
    }

    .logo-container {
        width: 70px;
        height: 70px;
        background: #f0f7ff;
        border-radius: 50%;
        margin: 0 auto 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e0e9ff;
        z-index: 1;
        position: relative;
    }

    .logo-container img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 50%;
    }

    .hospital-name {
        font-size: 20px;
        font-weight: bold;
        margin: 0;
        color: #2d3748;
    }

    .tagline {
        font-size: 12px;
        color: #718096;
        margin: 3px 0 0;
    }

    .section-title {
        font-size: 14px;
        font-weight: bold;
        margin: 0 0 10px;
        color: #2d3748;
        display: flex;
        align-items: center;
    }

    .section-title::before {
        content: "";
        display: inline-block;
        width: 3px;
        height: 14px;
        background-color: #0066ff;
        margin-right: 6px;
        border-radius: 1px;
    }

    .content-section {
        padding: 0 15px;
    }

    .appointment-details {
        position: relative;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eaeaea;
    }

    .confirmed-badge {
        position: absolute;
        top: 0;
        right: 0;
        background: #e6f7ee;
        color: #0e9f6e;
        padding: 3px 10px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: bold;
        display: flex;
        align-items: center;
    }

    .confirmed-badge svg {
        width: 12px;
        height: 12px;
        margin-right: 4px;
    }

    .info-item {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
    }

    .icon-container {
        width: 34px;
        height: 34px;
        background: #ebf5ff;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 12px;
        border: 1px solid #d9e8ff;
    }

    .icon-container svg {
        width: 16px;
        height: 16px;
    }

    .info-content {
        flex: 1;
    }

    .info-label {
        font-size: 11px;
        color: #718096;
        margin: 0;
        font-weight: 600;
    }

    .info-value {
        font-size: 13px;
        font-weight: bold;
        color: #2d3748;
        margin: 2px 0 0;
    }

    .patient-info {
        background: #fafafa;
        border-radius: 6px;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #f0f0f0;
    }

    .patient-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }

    .patient-item {
        margin-bottom: 5px;
    }

    .footer {
        padding: 10px 15px;
        background: #f9fbff;
        border-top: 1px solid #eaeaea;
        text-align: center;
        font-size: 10px;
        color: #718096;
    }

    .footer svg {
        width: 16px;
        height: 16px;
        margin-bottom: 4px;
    }

    @media print {
        body, .card {
            margin: 0;
            padding: 0;
            width: 100%;
            max-width: none;
            border: none;
            box-shadow: none;
        }
        .card::before, .confirmed-badge, .header, .patient-info {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            color-adjust: exact;
        }
    }
</style>

</head>
<body>
    <div class="card">
        <div class="header">
            <svg class="header-decoration" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="#0066ff">
                <path d="M100,0 C95,20 80,40 50,50 C20,60 0,80 0,100 L100,100 L100,0 Z" />
            </svg>
            <div class="logo-container">
                <img src="{{ public_path('healingTouchLogo.jpeg') }}"  alt="" style="object-fit: cover; width: 80px; height:80px">
            </div>
            <h1 class="hospital-name" style="margin-top:12px">HealingTouch Hospital</h1>
            <p class="tagline">Excellence in Healthcare</p>
        </div>

        <div class="content-section">
            <div class="appointment-details">
                <h2 class="section-title">Appointment Details</h2>
                <div class="confirmed-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#0e9f6e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    Confirmed
                </div>

                <div style="display: flex; gap:3;">
                    <div class="info-item">
                        <div class="icon-container">
                        
                        </div>
                        <div class="info-content">
                            <p class="info-label">Date & Time</p>
                            <p class="info-value">{{ $appointment->appointment_date }} {{ $appointment->appointment_time }}</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="icon-container">
                        
                        </div>
                        <div class="info-content">
                            <p class="info-label">Doctor</p>
                            <p class="info-value">{{ $appointment->doctor->user->name }}, {{ $appointment->qualification }}</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="icon-container">
                        
                        </div>
                        <div class="info-content">
                            <p class="info-label">Department</p>
                            <p class="info-value">{{ $appointment->doctor->department->name }}</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="icon-container">
                        
                        </div>
                        <div class="info-content">
                            <p class="info-label">Location</p>
                            <p class="info-value">Hope Chauraha, Rambagh Road, Linebazar, Purnea 854301</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="patient-info">
                <h2 class="section-title">Patient Information</h2>
                <div class="patient-grid">
                    <div class="patient-item">
                        <p class="info-label">Full Name</p>
                        <p class="info-value">{{ $appointment->patient->name }}</p>
                    </div>
                    <div class="patient-item">
                        <p class="info-label">Patient ID</p>
                        <p class="info-value">#{{ $appointment->patient_id }}</p>
                    </div>
                    <div class="patient-item">
                        <p class="info-label">Gender</p>
                        <p class="info-value">{{ $appointment->patient->gender }}</p>
                    </div>
                    <div class="patient-item">
                        <p class="info-label">Phone</p>
                        <p class="info-value">{{ $appointment->patient->phone }}</p>
                    </div>
                    <div class="patient-item">
                        <p class="info-label">Email</p>
                        <p class="info-value">{{ $appointment->patient->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            <p>Hope Chauraha, Rambagh Road, Linebazar, Purnea 854301 • +91 9471659700</p>
        </div>
    </div>
</body>
</html>
