<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
</head>
<body>
    <h1>Result</h1>

    @if($imagePath)
        <img src="{{ asset('storage/' . $imagePath) }}" alt="Captured Image">
    @else
        <p>No image found.</p>
    @endif
</body>
</html>
