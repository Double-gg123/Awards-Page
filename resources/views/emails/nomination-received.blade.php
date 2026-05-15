<!DOCTYPE html>
<html>
<body style="font-family:sans-serif;color:#1e293b;padding:32px;">
    <h2>New Nomination Received</h2>
    <table style="width:100%;border-collapse:collapse;">
        <tr><td style="padding:8px;font-weight:bold;">Star Name</td><td>{{ $nomination->name }}</td></tr>
        <tr><td style="padding:8px;font-weight:bold;">Nominator Email</td><td>{{ $nomination->email }}</td></tr>
        <tr><td style="padding:8px;font-weight:bold;">Phone</td><td>{{ $nomination->phone }}</td></tr>
        <tr><td style="padding:8px;font-weight:bold;">Category</td><td>{{ $nomination->category->name ?? '-' }}</td></tr>
        <tr><td style="padding:8px;font-weight:bold;">Sub Category</td><td>{{ $nomination->subCategory->name ?? '-' }}</td></tr>
        <tr><td style="padding:8px;font-weight:bold;">Reason</td><td>{{ $nomination->reason }}</td></tr>
        @if($nomination->socials)
        <tr><td style="padding:8px;font-weight:bold;vertical-align:top;">Socials</td>
        <td>@foreach($nomination->socials as $s){{ $s['platform'] ?? '' }}: {{ $s['handle'] ?? '' }}<br>@endforeach</td></tr>
        @endif
    </table>
    @if($nomination->image_path)
    <p><a href="{{ asset('storage/'.$nomination->image_path) }}">View Portrait</a></p>
    @endif
</body>
</html>