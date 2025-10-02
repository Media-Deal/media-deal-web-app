<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Request Update - MediaDeal</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f6f9; padding: 30px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                    
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background: #004aad; padding: 20px;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 22px;">MediaDeal Refunds</h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 30px; color: #333333;">
                            <h2 style="margin-top: 0;">Hello {{ $refund->user->name }},</h2>
                            <p style="font-size: 15px; line-height: 1.6;">
                                Your refund request for <strong>"{{ $refund->category }}"</strong> has been updated.
                            </p>

                            <!-- Refund Details -->
                            <div style="margin: 20px 0; padding: 15px; background: #f9f9f9; border-left: 4px solid #004aad;">
                                <p style="margin: 0; font-size: 14px; line-height: 1.5;">
                                    <strong>Status:</strong> {{ ucfirst($refund->status) }}<br>
                                    <strong>Refunded Amount:</strong> ${{ number_format($refund->refunded, 2) }}<br>
                                    @if(!empty($refund->feedback))
                                        <strong>Feedback:</strong> {{ $refund->feedback }}
                                    @endif
                                </p>
                            </div>

                            <p style="font-size: 14px; line-height: 1.6; margin-top: 30px;">
                                Thank you for your patience and for working with <strong>MediaDeal</strong>.
                            </p>

                            <p style="font-size: 14px; line-height: 1.6;">
                                Best regards,<br>
                                <strong>MediaDeal Support Team</strong>
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background: #f4f6f9; padding: 15px; font-size: 12px; color: #777;">
                            &copy; {{ date('Y') }} MediaDeal. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
