

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caesar Cipher R3sult</title>
    <style>
    body {
        font-family:  'Times New Roman', Times, serif, sans-serif;
        background-image: url('https://ihdwall.com/storage/2212/valorant-cypher-hd-wallpaper-1920x1080-24.jpg'); 
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        max-width: 600px;
        background-image: url('https://wallpapercave.com/wp/wp6438265.jpg');
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        overflow: auto; /* Tambahkan aturan ini untuk bilah pengguliran jika konten melebihi batas */
        max-height: 80vh; /* Tambahkan batas tinggi untuk kontainer */
    }

    h2 {
        text-align: center;
        color: #ff1414da;
    }

    p {
        font-size: 1.2rem;
        margin-top: 1rem;
        white-space: pre-wrap;
    }
</style>
</head>
<body>
    <div class="container">
        <?php
        function encrypt($text, $shift) {
            $encryptedText = "";

            for ($i = 0; $i < strlen($text); $i++) {
                $char = $text[$i];

                if ($char >= 'A' && $char <= 'Z') {
                    $encryptedChar = chr(((ord($char) - 65 + $shift) % 26) + 65);
                } elseif ($char >= 'a' && $char <= 'z') {
                    $encryptedChar = chr(((ord($char) - 97 + $shift) % 26) + 97);
                } else {
                    $encryptedChar = $char; // Keep non-alphabetic characters unchanged
                }

                $encryptedText .= $encryptedChar;
            }

            return $encryptedText;
        }

        function decrypt($encryptedText, $shift) {
            return encrypt($encryptedText, 26 - $shift); // Decrypting is the same as encrypting with opposite shift
        }

        if (isset($_POST['submit'])) {
            $text = $_POST['text'];
            $shift = (int)$_POST['shift'];
            $action = $_POST['action'];

            if ($action === 'encrypt') {
                $result = encrypt($text, $shift);
                $actionLabel = 'Encrypted';
            } elseif ($action === 'decrypt') {
                $result = decrypt($text, $shift);
                $actionLabel = 'Decrypted';
            }
        }
        ?>

        <h2><?php echo $actionLabel; ?> Text:</h2>
        <p><?php echo isset($result) ? $result : ''; ?></p>
    </div>
</body>
</html> 