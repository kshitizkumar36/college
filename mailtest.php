<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload and Compress Image</title>
</head>
<body>
    <h2>Upload an Image (max 200 KB)</h2>
    <form action="mailtest.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Upload and Compress</button>
    </form>
</body>
</html>
<?php
// Function to compress image to a target file size (200 KB)
function compressImage($source, $destination, $maxSizeKB = 200, $quality = 90) {
    $maxSize = $maxSizeKB * 1024;

    // Get image info
    $imgInfo = getimagesize($source);
    $mime = $imgInfo['mime'];

    // Create an image resource based on MIME type
    switch($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        default:
            return false; // Unsupported format
    }

    // Reduce quality in a loop until reaching desired file size
    do {
        ob_start();
        imagejpeg($image, null, $quality);
        $compressedImageData = ob_get_clean();

        if (strlen($compressedImageData) <= $maxSize) {
            file_put_contents($destination, $compressedImageData);
            break;
        }
        $quality -= 5; // Lower quality by 5 each time
    } while ($quality > 0);

    imagedestroy($image);

    return file_exists($destination);
}

// Handle the file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadedFile = $_FILES['image']['tmp_name'];
    $originalName = basename($_FILES['image']['name']);
    $destination = $uploadDir . 'compressed_' . $originalName;

    // Compress and save the uploaded file
    if (compressImage($uploadedFile, $destination)) {
        echo "Image uploaded and compressed successfully! <a href='$destination'>View Image</a>";
    } else {
        echo "Failed to compress the image.";
    }
} else {
    echo "No image file uploaded.";
}
?>
