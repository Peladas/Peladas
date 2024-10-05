<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peladas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="js/buttons.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&display=swap');

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;

        h1 {
            color: #fde047;
            font-size: 80px; /* 36px */
            font-weight: 700;
        }

        h2{
            font-size: 36px;
            font-weight:600;
            font-weight:bold;
        }

        h3 {
            color: #fde047;
            font-weight:bold;
        }

        legend {

            color: #FFD700;
            font-weight:bold;
            font-size: 24px;
            text-align: center;
        }

        p {
            color: #f1f5f9;
        }

        input {

            background-color: #18181b;
            border-radius: 8px;
            border: solid 1px #fde047;
            padding: 10px 10px;
        }

        .section {
            flex: 1;
            padding: 20px;

            box-sizing: border-box;
        }

        .container {
            margin-left: auto;
            margin-right: auto;
        }

        .imagem_logo {

            width: 55%;
            height: 55%;
            padding: 32px;
        }

        .texto-front {

            padding-top: 190px;
            padding-left: 30px;
        }

        .signin a:hover {
            text-decoration: underline royalblue;
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
<body class="bg-zinc-900 text-[#fafafa] break-words">
    <?php (isset($is_logged) && $is_logged) ? include_once __DIR__ . "/layout_logged.php" : include_once __DIR__ . "/layout_guest.php"; ?>
</body>
</html>
