<!DOCTYPE html>
<html>

<head>
    <title>New Ad Placement Request</title>
</head>

<body>
    <h2>New Ad Placement Request</h2>

    <p>Hello {{ $media->user->name ?? 'Media Manager' }},</p>

    <p>You have received a new ad placement request for <strong>{{ $media->name }}</strong>.</p>

    <h3>Ad Placement Details:</h3>
    <ul>
        <li><strong>Title:</strong> {{ $adPlacement->title }}</li>
        <li><strong>Advertiser:</strong> {{ $advertiser->name }} ({{ $advertiser->email }})</li>
        <li><strong>Category:</strong> {{ $adPlacement->category }}</li>
        <li><strong>Type:</strong> {{ $adPlacement->type }}</li>
        <li><strong>Target Audience:</strong> {{ $adPlacement->target_audience }}</li>
        <li><strong>Target Location:</strong> {{ $adPlacement->target_location }}</li>
        <li><strong>Duration:</strong> {{ $adPlacement->duration }}</li>
        <li><strong>Start Date:</strong> {{ $adPlacement->start_date ?? $adPlacement->specify_dates }}</li>
        <li><strong>Status:</strong> Pending Review</li>
    </ul>

    <p>Please log in to your Mediadeal.ng account to review this ad placement request.</p>

    <p>Best regards,<br>Mediadeal.ng Team</p>
</body>

</html>