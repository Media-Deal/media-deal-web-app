<!DOCTYPE html>
<html>

<head>
    <title>New Ad Placement Submission - Admin Notification</title>
</head>

<body>
    <h2>New Ad Placement Submission</h2>

    <p>Hello Admin,</p>

    <p>A new ad placement has been submitted on Mediadeal.ng.</p>

    <h3>Ad Placement Details:</h3>
    <ul>
        <li><strong>Title:</strong> {{ $adPlacement->title }}</li>
        <li><strong>Advertiser:</strong> {{ $advertiser->name }} ({{ $advertiser->email }})</li>
        <li><strong>Media Organization:</strong> {{ $media->name }}</li>
        <li><strong>Category:</strong> {{ $adPlacement->category }}</li>
        <li><strong>Type:</strong> {{ $adPlacement->type }}</li>
        <li><strong>Target Audience:</strong> {{ $adPlacement->target_audience }}</li>
        <li><strong>Target Location:</strong> {{ $adPlacement->target_location }}</li>
        <li><strong>Duration:</strong> {{ $adPlacement->duration }}</li>
        <li><strong>Start Date:</strong> {{ $adPlacement->start_date ?? $adPlacement->specify_dates }}</li>
        <li><strong>Submission Date:</strong> {{ $adPlacement->created_at->format('F j, Y g:i A') }}</li>
    </ul>

    <p>This ad placement is currently pending review by the media organization.</p>

    <p>Best regards,<br>Mediadeal.ng System</p>
</body>

</html>