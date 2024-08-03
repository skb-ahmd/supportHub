<!DOCTYPE html>
<html>
<head>
    <title>Ticket Acknowledgment</title>
</head>
<body>
    <h1>Thank you for contacting us, {{ $ticket['customer_name'] }}</h1>
    <p>Your ticket has been received. Here are the details:</p>
    <ul>
        <li><strong>Reference Number:</strong> {{ $ticket['reference_number'] }}</li>
        <li><strong>Problem Description:</strong> {{ $ticket['problem_description'] }}</li>
    </ul>
    <p>We will get back to you shortly.</p>
    <p>Best regards,</p>
    <p>The Support Team</p>
</body>
</html>
