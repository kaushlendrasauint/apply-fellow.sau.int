<!DOCTYPE html>
<html>
<head>
    <title>Application Submitted</title>
</head>
<body>
    <p>Dear {{ $details['name'] }},</p>

    <p>Your application for {{ $details['post'] }} has been submitted. The submitted application may be downloaded either by logging into the recruitment portal (<a href="https://apply.sau.int">https://apply.sau.int</a>) or by directly downloading from <a href="{{ $details['application_link'] }}">Click Here</a>.</p>

    <p>Thank you.</p>

    <p>- SAU Recruitment Team</p>
</body>
</html>
