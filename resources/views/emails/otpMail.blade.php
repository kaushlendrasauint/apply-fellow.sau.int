<!DOCTYPE html>
<html>

<head>
    <title>SAU Recruitment Portal ::Sau.ac.in</title>
</head>

<body>
    Dear {{ $mailData['name'] }},<br>
    <br>
    You are in the process to register yourself for SAU Recruitment Portal. The OTP for the email verification is <br>
    <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
        {{ $mailData['otp'] }}</h2>
    <br>
    <br>
    <b>Team SAU Recruitment Portal</b>

    <p>Thank you</p>
</body>

</html>
