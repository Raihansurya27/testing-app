<!DOCTYPE html>
<html>
<head>
    <title>E-KYC Verification</title>
</head>
<body>
    <h1>E-KYC Verification</h1>

    <form action="{{ route('kyc.submit') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="document">Document (PDF or Image):</label>
        <input type="file" id="document" name="document" accept=".pdf,.png,.jpg,.jpeg" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
