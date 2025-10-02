<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ad Status Updated</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h2 {
            color: #2c3e50;
        }
        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            color: #fff;
        }
        .processing { background-color: #6c757d; }
        .ongoing { background-color: #007bff; }
        .completed { background-color: #28a745; }
        .aborted { background-color: #dc3545; }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Hello {{ $adPlacement->user->name }},</h2>

        <p>We wanted to let you know that the status of your advertisement has been updated.</p>

        <p><strong>Ad Title:</strong> {{ $adPlacement->title }}</p>

        <p><strong>New Status:</strong>
            @switch($adPlacement->status)
                @case(0)
                    <span class="status-badge processing">Processing</span>
                    @break
                @case(1)
                    <span class="status-badge ongoing">Ongoing</span>
                    @break
                @case(2)
                    <span class="status-badge completed">Completed</span>
                    @break
                @case(3)
                    <span class="status-badge aborted">Aborted</span>
                    @break
            @endswitch
        </p>

        <p>Thank you for trusting us with your advertising needs. We’ll keep you updated on any further changes.</p>

        <div class="footer">
            &copy; {{ date('Y') }} Your Company. All rights reserved.
        </div>
    </div>
</body>
</html>
