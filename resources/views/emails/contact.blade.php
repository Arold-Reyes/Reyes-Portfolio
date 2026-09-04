<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Contact</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h2 style="color: #333333; border-bottom: 2px solid #4f46e5; padding-bottom: 10px; margin-top: 0;">New Portfolio Contact</h2>

        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <td style="padding: 10px 0; font-weight: bold; color: #555555; width: 120px;">Name:</td>
                <td style="padding: 10px 0; color: #333333;">{{ $name }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; font-weight: bold; color: #555555;">Email:</td>
                <td style="padding: 10px 0; color: #333333;">{{ $email }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; font-weight: bold; color: #555555;">Subject:</td>
                <td style="padding: 10px 0; color: #333333;">{{ $subject }}</td>
            </tr>
        </table>

        <div style="margin-top: 20px;">
            <h3 style="color: #555555; margin-bottom: 10px;">Message:</h3>
            <p style="color: #333333; line-height: 1.6; background-color: #f9f9f9; padding: 15px; border-radius: 4px; border-left: 4px solid #4f46e5;">{{ $message }}</p>
        </div>

        <hr style="border: none; border-top: 1px solid #eeeeee; margin: 30px 0 15px 0;">
        <p style="color: #999999; font-size: 12px; text-align: center; margin: 0;">This message was sent via the portfolio contact form.</p>
    </div>
</body>
</html>
