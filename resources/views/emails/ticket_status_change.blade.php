<!DOCTYPE html>
<html>
<head>
    <title>Your Ticket Status Has Changed</title>
</head>
<body>
    <h1>Ticket Status Update</h1>
    <p>Dear {{ $ticket->customer_name }},</p>
    <p>The status of your ticket (ID: {{ $ticket->reference_number }}) has been updated to {{ ucfirst($ticket->status) }}.</p>
    <p>Thank you for your patience.</p>
    <p>Best regards,</p>
    <p>Support Team</p>
</body>
</html>
