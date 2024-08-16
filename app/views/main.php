<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peladas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/buttons.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <style>
        .custom-styles {
            background-color: black; 
            color: #fafafa; 
            font-weight: 600; 
        }

        @media (prefers-color-scheme: dark) {
            .custom-styles {
                background-color: #020617; 
                color: #f1f5f9; 
            }
        }
    </style>
</head>
<body class="custom-styles">
    <?php (isset($is_logged) && $is_logged) ? include_once __DIR__ . "/layout_logged.php" : include_once __DIR__ . "/layout_guest.php"; ?>
</body>
</html>
