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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geo&family=Jersey+10&family=Orbitron:wght@400..900&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: #18181b;
            color: #1e293b;

            h1 {
                color: #fde047;
                /* 36px */
                font-weight: 700;
            }

            h3 {
                font-weight: bold;
                color: #3b82f6;
            }

            h4 {
                font-weight: bold;
                color: #7e22ce;
            }

            legend {

                color: #6b21a8;
                font-weight: bold;
                font-size: 24px;
                text-align: center;
            }

            input {
                background-color: #f1f5f9;
                border-radius: 8px;
                border: solid 1px;
                border-color: #7e22ce;
                padding: 10px 10px;
            }

            .section {
                flex: 1;
                padding: 20px;
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

            .jersey {

                font-family: "Jersey 10", sans-serif;
                font-weight: 400;
                font-style: normal;
            }

            #picture__input {
                display: none;
            }

            .picture {
                width: 180px;
                height: 180px;
                aspect-ratio: 16/9;
                border: 2px dashed #334155;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                color: #aaa;
                cursor: grab;
                font-family: sans-serif;
                transition: color 300ms ease-in-out, background 300ms ease-in-out;
                outline: none;
                overflow: hidden;
                text-align: center;
            }

            .picture:hover {
                color: #f1f5f9;
                background: #bfdbfe;
                border-color: #60a5fa;
            }

            .picture:active {
                border-color: #7c3aed;
                cursor: grabbing;
            }

            .picture:focus {
                color: #f8fafc;
                background: #a855f7;
                border-color: #2e1065;
                cursor: grabbing;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            }

            .picture__img {
                max-width: 100%;
            }

            /* styles.css */

/* Modo Claro (por padrão) */
body.light-mode {
    background-color: white;
    color: black;
}

/* Modo Escuro */
body.dark-mode {
    background-color: black;
    color: white;
}

/* Estilização do botão */
button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    background-color: #a74fff; /* Cor inicial do botão */
    color: white;
}

button:hover {
    background-color: #9158cc; /* Cor ao passar o mouse */
}

            svg{
                color: white;
                width: auto;
                height: auto;
            }



        }


    </style>
</head>

<body class="bg-slate-100 dark:bg-zinc-900 dark:text-[#fafafa] break-words">
    <?php (isset($is_logged) && $is_logged) ? include_once __DIR__ . "/layout_logged.php" : include_once __DIR__ . "/layout_guest.php"; ?>
</body>

</html>
