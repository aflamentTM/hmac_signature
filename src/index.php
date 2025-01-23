<?php 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonData = $_POST['jsonData']; 
    $secretKey = $_POST['secretKey']; 

    // Create a hash of the JSON data using HMAC-SHA256
    $hash = hash_hmac('sha256', $jsonData, $secretKey, true); 

    // Base64 encode the hash
    $signature = base64_encode($hash);

    // Output the signature
    echo "<h2>Signature:</h2>";
    echo "<p>" . $signature . "</p>";
} else {
?>

<!DOCTYPE html>
<html>
<head>
    <title>API Signature Generator</title>
</head>
<body>

    <h1>API Signature Generator</h1>

    <form method="post">
        <label for="jsonData">JSON Data:</label><br>
        <textarea id="jsonData" name="jsonData" rows="10" cols="50"></textarea><br><br>

        <label for="secretKey">Secret Key:</label><br>
        <input type="text" id="secretKey" name="secretKey"><br><br>

        <input type="submit" value="Generate Signature">
    </form>

</body>
</html>

<?php
}
?>