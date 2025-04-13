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
            margin: 0;
            padding: 0;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        .card {
            width: 100%;
            max-width: 650px;
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            overflow: hidden;
            padding: 0;
            margin: 20px auto;
            box-sizing: border-box;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: relative;
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, #0066ff, #00a3ff);
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            padding: 25px 20px 15px;
            border-bottom: 1px solid #eaeaea;
            position: relative;
            background-color: #f9fbff;
        }

        .header-decoration {
            position: absolute;
            top: 0;
            right: 0;
            width: 120px;
            height: 120px;
            opacity: 0.05;
            z-index: 0;
        }

        .logo-container {
            width: 90px;
            height: 90px;
            background-color: #f0f7ff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 15px;
            border: 2px solid #e0e9ff;
            position: relative;
            z-index: 1;
        }

        .logo {
            font-family: Arial, sans-serif;
            color: #0066ff;
            font-size: 26px;
            font-weight: bold;
        }

        .hospital-name {
            font-size: 26px;
            font-weight: bold;
            margin: 0;
            color: #2d3748;
            position: relative;
            z-index: 1;
        }

        .tagline {
            color: #718096;
            margin: 5px 0 0;
            font-size: 15px;
            position: relative;
            z-index: 1;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin: 0 0 15px;
            color: #2d3748;
            display: flex;
            align-items: center;
        }

        .section-title::before {
            content: "";
            display: inline-block;
            width: 4px;
            height: 18px;
            background-color: #0066ff;
            margin-right: 8px;
            border-radius: 2px;
        }

        .content-section {
            padding: 0 25px;
        }

        .appointment-details {
            position: relative;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eaeaea;
        }

        .confirmed-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #e6f7ee;
            color: #0e9f6e;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .confirmed-badge svg {
            margin-right: 5px;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
        }

        .icon-container {
            width: 44px;
            height: 44px;
            background-color: #ebf5ff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 16px;
            border: 1px solid #d9e8ff;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-size: 13px;
            color: #718096;
            margin: 0;
            font-weight: 600;
        }

        .info-value {
            font-size: 15px;
            font-weight: bold;
            color: #2d3748;
            margin: 4px 0 0;
        }

        .patient-info {
            background-color: #fafafa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            border: 1px solid #f0f0f0;
        }

        .patient-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .patient-item {
            margin-bottom: 8px;
        }

        .footer {
            padding: 15px 25px;
            background-color: #f9fbff;
            border-top: 1px solid #eaeaea;
            text-align: center;
            font-size: 12px;
            color: #718096;
        }

        .footer svg {
            margin-bottom: 8px;
        }

        .qr-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 25px;
            background-color: #f9fbff;
            border-top: 1px solid #eaeaea;
        }

        .qr-code {
            width: 80px;
            height: 80px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 5px;
            background-color: white;
        }

        .qr-info {
            flex: 1;
            padding-left: 15px;
        }

        .qr-title {
            font-size: 14px;
            font-weight: bold;
            margin: 0 0 5px;
            color: #2d3748;
        }

        .qr-text {
            font-size: 12px;
            color: #718096;
            margin: 0;
        }

        @media print {
            body {
                padding: 0;
                margin: 0;
            }
            
            .card {
                border: none;
                width: 100%;
                max-width: none;
                margin: 0;
                box-shadow: none;
            }

            .card::before {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            .patient-info, .icon-container, .confirmed-badge, .header, .footer, .qr-section {
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
                print-color-adjust: exact;
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
                <div class="logo">logo</div>
            </div>
            <h1 class="hospital-name">MedCare Hospital</h1>
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
                
                <div class="info-item">
                    <div class="icon-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <div class="info-content">
                        <p class="info-label">Date & Time</p>
                        <p class="info-value">April 15, 2025 • 10:30 AM</p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="icon-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="info-content">
                        <p class="info-label">Doctor</p>
                        <p class="info-value">Dr. Sarah Johnson, MD</p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="icon-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2z"></path>
                            <path d="M18 14h-6"></path>
                            <path d="M18 11h-6"></path>
                            <path d="M18 8h-6"></path>
                            <circle cx="8" cy="14" r="1"></circle>
                            <circle cx="8" cy="11" r="1"></circle>
                            <circle cx="8" cy="8" r="1"></circle>
                        </svg>
                    </div>
                    <div class="info-content">
                        <p class="info-label">Department</p>
                        <p class="info-value">Cardiology</p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="icon-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <div class="info-content">
                        <p class="info-label">Location</p>
                        <p class="info-value">Building A, Room 305</p>
                    </div>
                </div>
            </div>

            <div class="patient-info">
                <h2 class="section-title">Patient Information</h2>
                <div class="patient-grid">
                    <div class="patient-item">
                        <p class="info-label">Full Name</p>
                        <p class="info-value">Emily Richardson</p>
                    </div>
                    <div class="patient-item">
                        <p class="info-label">Patient ID</p>
                        <p class="info-value">MH-23578964</p>
                    </div>
                    <div class="patient-item">
                        <p class="info-label">Date of Birth</p>
                        <p class="info-value">June 12, 1985</p>
                    </div>
                    <div class="patient-item">
                        <p class="info-label">Gender</p>
                        <p class="info-value">Female</p>
                    </div>
                    <div class="patient-item">
                        <p class="info-label">Phone</p>
                        <p class="info-value">+1 (555) 987-6543</p>
                    </div>
                    <div class="patient-item">
                        <p class="info-label">Email</p>
                        <p class="info-value">emily.r@example.com</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="qr-section">
            <div class="qr-code">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80">
                    <rect width="10" height="10" x="10" y="10" fill="#000"></rect>
                    <rect width="10" height="10" x="20" y="10" fill="#000"></rect>
                    <rect width="10" height="10" x="30" y="10" fill="#000"></rect>
                    <rect width="10" height="10" x="50" y="10" fill="#000"></rect>
                    <rect width="10" height="10" x="60" y="10" fill="#000"></rect>
                    <rect width="10" height="10" x="10" y="20" fill="#000"></rect>
                    <rect width="10" height="10" x="40" y="20" fill="#000"></rect>
                    <rect width="10" height="10" x="60" y="20" fill="#000"></rect>
                    <rect width="10" height="10" x="10" y="30" fill="#000"></rect>
                    <rect width="10" height="10" x="30" y="30" fill="#000"></rect>
                    <rect width="10" height="10" x="50" y="30" fill="#000"></rect>
                    <rect width="10" height="10" x="60" y="30" fill="#000"></rect>
                    <rect width="10" height="10" x="30" y="40" fill="#000"></rect>
                    <rect width="10" height="10" x="50" y="40" fill="#000"></rect>
                    <rect width="10" height="10" x="10" y="50" fill="#000"></rect>
                    <rect width="10" height="10" x="30" y="50" fill="#000"></rect>
                    <rect width="10" height="10" x="50" y="50" fill="#000"></rect>
                    <rect width="10" height="10" x="60" y="50" fill="#000"></rect>
                    <rect width="10" height="10" x="10" y="60" fill="#000"></rect>
                    <rect width="10" height="10" x="20" y="60" fill="#000"></rect>
                    <rect width="10" height="10" x="30" y="60" fill="#000"></rect>
                    <rect width="10" height="10" x="60" y="60" fill="#000"></rect>
                </svg>
            </div>
            <div class="qr-info">
                <h3 class="qr-title">Quick Access Code</h3>
                <p class="qr-text">Scan this code at reception for faster check-in</p>
            </div>
        </div>

        <div class="footer">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            <p>MedCare Hospital • 123 Healthcare Avenue • City, State 12345 • (555) 123-4567</p>
        </div>
    </div>
</body>
</html>