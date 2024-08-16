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
        
        body {
            background-color: black; 
            color: #fafafa; 
            padding: 5%;
            padding-top: 0.125rem; /* 2px */
            padding-bottom: 0.125rem; /* 2px */

        h1 {
            color: #fde047;
            font-size: 80px; /* 36px */
            font-weight: 700; 
        }
        
        h2{
            font-size: 35px;
            font-weight:600;
        }
        
        h3 {
            color: #fde047;
            font-weight:bold;
        }
    }

        @media (prefers-color-scheme: dark) {
            .body {
                background-color: #020617; 
                color: #f1f5f9; 
            }
        }
    </style>
</head>
<body>
    <div class="container">
    <?php (isset($is_logged) && $is_logged) ? include_once __DIR__ . "/layout_logged.php" : include_once __DIR__ . "/layout_guest.php"; ?>
    </div>
</body>
</html>