<!DOCTYPE html>
<html>
<head>
    <title>Your Ticket Has Been Updated</title>
</head>
<body>
    <h1>Ticket Update</h1>
    <p>Dear {{ $ticket->customer_name }},</p>
    <p>Your ticket (ID: {{ $ticket->reference_number }}) has been updated.</p>
    <p><strong>Reply from Support:</strong></p>
    <p>{{ $replyMessage }}</p>
    <p>Thank you for your patience.</p>
    <p>Best regards,</p>
    <p>Support Team</p>
</body>
</html>
