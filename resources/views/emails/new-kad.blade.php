<!DOCTYPE html>
<html>
<head>
    <title>New Kad Created</title>
</head>
<!-- PHP variable -->
@php
    if($kadData['package_id'] == 3)
    {
        $pakej = 'Deluxe';
    }
    if($kadData['package_id'] == 2)
    {
        $pakej = 'Premium';
    }
    if($kadData['package_id'] == 1)
    {
        $pakej = 'Basic';
    }
@endphp 
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;">
    <table width="100%" style="border-collapse: collapse; background-color: #ffffff; margin: 20px auto; max-width: 600px;">
        <tr>
            <td style="padding: 20px; text-align: center;">
                <img src="https://yourdomain.com/images/Logo-Header.png" alt="Logo" style="max-width: 100px;">
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; text-align: left;">
                <h1 style="color: #333;">Congratulation!</h1>
                <p style="color: #555;">A Kad is successfully created</p>
                <p>Tarikh Majlis: {{ $kadData['tarikh_majlis'] }}</p>
                <p>Design Id: {{ $kadData['design_id'] }}</p>
                <p>Pakej: {{ $pakej }}</p>
                <a href="staging.onlinekad.com/invitation/{{ $kadData['slug'] }}" style="display: inline-block; padding: 10px 20px; background-color: #007BFF; color: #ffffff; text-decoration: none; border-radius: 4px;">
                    Check it out!! 
                </a>
            </td>
        </tr>
    </table>
</body>
</html>
