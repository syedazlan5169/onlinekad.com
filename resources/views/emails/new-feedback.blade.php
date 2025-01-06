<!DOCTYPE html>
<html>
<head>
    <title>New Feedback</title>
</head>
<!-- PHP variable -->
@php
    
@endphp 
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;">
    <table width="100%" style="border-collapse: collapse; background-color: #ffffff; margin: 20px auto; max-width: 600px;">
        <tr>
            <td style="padding: 20px; text-align: center;">
                <img src="https://onlinekad.com/images/Logo-Header.png" alt="Logo" style="max-width: 100px;">
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; text-align: left;">
                <h1 style="color: #333;">New {{ $feedbackData['subjek'] }} Received</h1>
                <p>Name: {{ $feedbackData['nama'] }}</p>
                <p>Email: {{ $feedbackData['email'] }}</p>
                <p>Phone: {{ $feedbackData['telefon'] }}</p>
                <p>Massage: {{ $feedbackData['mesej'] }}</p>
            </td>
        </tr>
    </table>
</body>
</html>
