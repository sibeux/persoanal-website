<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Viewer and Downloader</title>
</head>

<body>
    <h1>Image Viewer and Downloader</h1>
    <form method="post" action="">
        <label for="base_url">Base URL (without index):</label><br>
        <input type="text" id="base_url" name="base_url" placeholder="https://example.com/image" required><br><br>

        <label for="image_count">Number of Images:</label><br>
        <input type="number" id="image_count" name="image_count" min="1" required><br><br>

        <label for="extension">Image Extension:</label><br>
        <select id="extension" name="extension" required>
            <option value="jpg">JPG</option>
            <option value="png">PNG</option>
            <option value="webp">WEBP</option>
            <option value="gif">GIF</option>
        </select><br><br>

        <button type="submit">Generate</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $base_url = rtrim($_POST['base_url'], '/');
        $image_count = intval($_POST['image_count']);
        $extension = $_POST['extension'];

        echo "<h2>Generated Images:</h2>";
        echo "<div style='display: flex; flex-wrap: wrap;'>";

        $image_urls = [];
        for ($i = 1; $i <= $image_count; $i++) {
            $image_url = $base_url . "/" . $i . ".$extension";
            $image_urls[] = $image_url;
            echo "<div style='margin: 10px;'>";
            echo "<img src='$image_url' alt='Image $i' style='width: 150px; height: auto; display: block;'>";
            echo "</div>";
        }

        echo "</div>";

        $zip_file = 'images.zip';
        $zip = new ZipArchive;

        if ($zip->open($zip_file, ZipArchive::CREATE) === TRUE) {
            foreach ($image_urls as $index => $url) {
                // Get image content using cURL (better SSL handling)
                $image_content = fetch_image($url);
                if ($image_content !== false) {
                    // Save as selected extension
                    $zip->addFromString("image-" . ($index + 1) . ".$extension", $image_content);
                } else {
                    echo "<p style='color: red;'>Failed to fetch image: $url</p>";
                }
            }
            $zip->close();

            echo "<a href='$zip_file' download>Download All Images</a>";
        } else {
            echo "<p style='color: red;'>Failed to create zip file.</p>";
        }
    }

    // Function to fetch image content using cURL (better SSL handling)
    function fetch_image($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disable SSL verification temporarily (not recommended for production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // Disables peer verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // Disables host verification
    
        // Set a user-agent to simulate a real browser request
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36");

        // Execute the cURL request
        $image_content = curl_exec($ch);

        if (curl_errno($ch)) {
            // Handle cURL error
            echo 'cURL error: ' . curl_error($ch);
            curl_close($ch);
            return false;
        }

        // Check if the content is an image
        $content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
        curl_close($ch);

        // Validate that the content is an image
        if (strpos($content_type, 'image') === false) {
            echo "<p style='color: red;'>Invalid image content for URL: $url. Content type: $content_type</p>";
            return false;
        }

        return $image_content;
    }
    ?>
</body>

</html>