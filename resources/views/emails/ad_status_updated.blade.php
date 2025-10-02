<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ad Status Updated</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-wrapper {
            max-width: 650px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        p {
            font-size: 15px;
            line-height: 1.6;
        }
        .highlight {
            font-weight: bold;
            color: #2c3e50;
        }
        .status-badge {
            display: inline-block;
            padding: 8px 18px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: bold;
            text-transform: capitalize;
            color: #fff;
        }
        .processing { background-color: #6c757d; }
        .ongoing { background-color: #007bff; }
        .completed { background-color: #28a745; }
        .aborted { background-color: #dc3545; }
        .footer {
            margin-top: 25px;
            font-size: 13px;
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <h2>Hello {{ $adPlacement->user->name }},</h2>

        <p>Your advertisement titled <span class="highlight">"{{ $adPlacement->title }}"</span> has been updated.</p>

        <p><strong>New Status:</strong>
            @if($adPlacement->status === 'processing')
                <span class="status-badge processing">Processing</span>
            @elseif($adPlacement->status === 'ongoing')
                <span class="status-badge ongoing">Ongoing</span>
            @elseif($adPlacement->status === 'completed')
                <span class="status-badge completed">Completed</span>
            @elseif($adPlacement->status === 'aborted')
                <span class="status-badge aborted">Aborted</span>
            @endif
        </p>

        <p>We appreciate your trust in our platform. You will be notified of any further updates regarding your ad.</p>

        <div class="footer">
            &copy; {{ date('Y') }} Your Company. All rights reserved.
        </div>
    </div>
</body>
</html>
