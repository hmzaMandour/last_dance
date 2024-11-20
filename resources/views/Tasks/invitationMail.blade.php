<!DOCTYPE html>
<html>

<head>
    <title>Team Invitation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background-color: #446fcc;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .email-body {
            padding: 20px;
            color: #333;
        }

        .email-body p {
            margin: 15px 0;
        }

        .email-body a {
            text-decoration: none;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            margin: 10px 5px;
            padding: 10px 20px;
            background-color: #446fcc;
            color: #ffffff;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .button.reject {
            background-color: #e53e3e;
        }

        .email-footer {
            background-color: #f4f4f4;
            color: #888;
            padding: 15px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            Team Invitation
        </div>

        <!-- Body -->
        <div class="email-body">
            <h1 style="font-size: 22px; color: #446fcc; margin-bottom: 10px;">You have been invited to join a team!</h1>
            <p>Hello,</p>
            <p>
                You have been invited to join the team 
                <strong>{{ optional($invitation->team)->name ?? 'Unknown Team' }}</strong>.
            </p>
            <p>
                Click below to respond to the invitation:
            </p>
            <div style="text-align: center;">
                <a href="{{ $acceptUrl }}" class="button">Accept Invitation</a>
                <a href="{{ $rejectUrl }}" class="button reject">Reject Invitation</a>
            </div>
            <p>If you were not expecting this email, please disregard it.</p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            This is an automated email. Please do not reply.
        </div>
    </div>
</body>

</html>
