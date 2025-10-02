<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ad Status Updated</title>
</head>
<body>
    <h2>Hello {{ $adPlacement->user->name }},</h2>
    <p>Your advertisement titled <strong>{{ $adPlacement->title }}</strong> has been updated.</p>

    <p><strong>New Status:</strong> 
        @if($adPlacement->status == 0)
            Processing
        @elseif($adPlacement->status == 1)
            Ongoing
        @elseif($adPlacement->status == 2)
            Completed
        @elseif($adPlacement->status == 3)
            Aborted
        @endif
    </p>

    <p>Thank you for using our platform!</p>
</body>
</html>
