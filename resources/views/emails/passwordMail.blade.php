<!DOCTYPE html>
<html>

<head>
    <title>SAU Recruitment Portal ::Sau.ac.in</title>
</head>

<body>

    <p>Dear {{ $mailData['name'] }},</p>
    <p>Greetings from South Asian University!</p>
    <p>Please find your login details below:</p>
    <p>Username: {{ $mailData['email'] }}</p>
    <p>Password: {{ $mailData['password'] }}</p>
    <p>Please keep this information secure and confidential to maintain your privacy. These credentials can be used to
        complete as well as check the status of your application with South Asian University.</p>

    <p>To log in, visit&nbsp;<a href="https://apply-fellow.sau.int/">https://apply-fellow.sau.int</a>. You&#39;ll gain
        access to your existing application form(s) and also be able to create new application(s).<br />
        Should you encounter any issues during the application process or have any questions, please don&#39;t hesitate
        to reach out to our Recruitment team at&nbsp;<a href="mailto:recruitment@sau.int" rel="noreferrer"
            target="_blank">recruitment@sau.int</a></p>

    <p>We look forward to reviewing your application.</p>
    <p>Best regards,</p>
    <p>Team SAU Recruitment Portal</p>
    <p>Thank you</p>

</body>

</html>
