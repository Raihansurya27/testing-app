<!DOCTYPE html>
<html>
<head>
    <title>Camera Capture</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Camera Capture</h1>

    <form action="" method="post">
        @csrf
        <video id="camera" autoplay></video>
        <button id="capture" type="button">Capture</button>
    </form>


    <script>
        const videoElement = document.getElementById('camera');
        const captureButton = document.getElementById('capture');

        async function startCamera() {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true });
            videoElement.srcObject = stream;
        }

        async function captureImage() {
            const canvas = document.createElement('canvas');
            canvas.width = videoElement.videoWidth;
            canvas.height = videoElement.videoHeight;
            canvas.getContext('2d').drawImage(videoElement, 0, 0, canvas.width, canvas.height);

            const image = canvas.toDataURL('image/png');

            // Kirim gambar ke server
            const response = await fetch('/process-image', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ image }),
            });

            const result = await response.json();

            // Redirect ke halaman lain
            window.location.href = '/result?image=' + result.imagePath;
        }

        startCamera();
        captureButton.addEventListener('click', captureImage);
    </script>
</body>
</html>
