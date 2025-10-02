<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedialDeal Ad Status Update</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f6f9; padding: 30px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                    
                    <!-- Header -->
                    <tr>
                        <td align="center" style="background: #004aad; padding: 20px;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 22px;">MedialDeal</h1>
                            <p style="color: #dbe9ff; margin: 5px 0 0; font-size: 14px;">Advertisement Update Notification</p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 30px; color: #333333;">
                            <h2 style="margin-top: 0;">Hello {{ $adPlacement->user->name }},</h2>
                            <p style="font-size: 15px; line-height: 1.6;">
                                Your advertisement titled 
                                <span style="color:#004aad; font-weight:bold;">"{{ $adPlacement->title }}"</span> 
                                has just been updated.
                            </p>

                            <!-- Status Badge -->
                            <p style="margin: 20px 0; font-size: 15px;">
                                <strong>New Status:</strong><br>
                                @if($adPlacement->status === 'processing')
                                    <span style="display:inline-block; padding:8px 18px; border-radius:25px; background:#6c757d; color:#fff; font-size:14px; font-weight:bold;">Processing</span>
                                @elseif($adPlacement->status === 'ongoing')
                                    <span style="display:inline-block; padding:8px 18px; border-radius:25px; background:#007bff; color:#fff; font-size:14px; font-weight:bold;">Ongoing</span>
                                @elseif($adPlacement->status === 'completed')
                                    <span style="display:inline-block; padding:8px 18px; border-radius:25px; background:#28a745; color:#fff; font-size:14px; font-weight:bold;">Completed</span>
                                @elseif($adPlacement->status === 'aborted')
                                    <span style="display:inline-block; padding:8px 18px; border-radius:25px; background:#dc3545; color:#fff; font-size:14px; font-weight:bold;">Aborted</span>
                                @endif
                            </p>

                            <!-- Info -->
                            <p style="font-size: 15px; line-height: 1.6;">
                                We appreciate your trust in <strong>MedialDeal</strong>.  
                                You’ll be notified of any further updates regarding your ad.
                            </p>

                            <p style="font-size: 14px; line-height: 1.6; margin-top: 30px;">
                                Best regards,<br>
                                <strong>MedialDeal Team</strong>
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background: #f4f6f9; padding: 15px; font-size: 12px; color: #777;">
                            &copy; {{ date('Y') }} MedialDeal. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
