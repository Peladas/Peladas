<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peladas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <script src="/js/tailwind.es"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="js/buttons.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geo&family=Jersey+10&family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Geo&family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />

    <script type="text/javascript">
        tailwind.config = {
            darkMode: 'class'
        }
    </script>

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: #18181b;
            line-height: 2;
            text-wrap: wrap;
        }

        h1 {
            color: #6b21a8;
            font-weight: 900;
            font-size: 30px;
            line-height: 40px;
            font-family: "Anton SC", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        a {
            color: #475569;
            font-size: 16px;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            border: 1px solid #CBD5E1;
            background-color: #F8FAFC;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .botao-estilizado {
            color: #475569;
            font-size: 16px;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            border: 1px solid #CBD5E1;
            background-color: #F8FAFC;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
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

        input:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-color: #334155;
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

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        a#switchBtn {
            border: 1px solid #cbd5e1;
            background: transparent;
            cursor: pointer;
            border-radius: 9999px;
            padding: 6px 10px;
            font-size: 16px;
            color: #334155;
            transition: all 0.3s ease, transform 0.2s ease;
            filter: drop-shadow(0 4px 6px rgb(0 0 0 / 0.1));
            margin-top: 4px;
        }

        a#switchBtn:hover {
            border-color: #94a3b8;
            background: rgba(148, 163, 184, 0.1);
            color: #1e293b;
            transform: translateY(-2px);
            filter: drop-shadow(0 8px 10px rgb(0 0 0 / 0.15));
        }

        a#switchBtn:active {
            transform: translateY(0);
            filter: drop-shadow(0 4px 6px rgb(0 0 0 / 0.1));
        }

        a#switchBtn i {
            font-size: 18px;
            margin: 2px;
        }

        a#botaoLink {
            padding: 0.5rem 1rem;
            background-color: transparent;
            color: #374151;
            border: 1px solid #d1d5db;
            transition: all 0.3s;
            transform: scale(1);
        }

        a#botaoLink:hover {
            transform: scale(1.05);
            background-color: #e5e7eb;
            color: #1f2937;
            border-color: #d1d5db;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        a#dispBtn {
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            transition: all 0.3s;
            transform: scale(1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        a#dispBtn:hover {
            transform: scale(1.05);
            background-color: #e5e7eb;
            color: #1f2937;
            border-color: #d1d5db;
        }

        a#dispBtn:focus {
            outline: none;
        }

        /* Dark Mode* */

        html.dark a#botaoLink {
            color: #e2e8f0;
        }

        html.dark a#botaoLink:hover {
            border: none;
            background-color: #0f0f0f;
        }

        html.dark h1 {
            color: #fcd34d;
        }

        html.dark a#dispBtn {
            background-color: #18181b;
            border-color: #4b5563;
            color: #d1d5db;
        }

        html.dark a#dispBtn:hover {
            background-color: #2a2a33;
        }
    </style>
</head>

<body class="bg-slate-100 dark:bg-zinc-900 dark:text-[#fafafa] break-words">
    <?php (isset($is_logged) && $is_logged) ? include_once __DIR__ . "/layout_logged.php" : include_once __DIR__ . "/layout_guest.php"; ?>

    <!-- <script type="text/javascript">
        document.getElementById('switchBtn').addEventListener('click', () => {
            const html = document.getElementsByTagName('html').item(0);
            const body = document.body;
            const darkModeToggle = document.getElementById('switchBtn');
            const texto = document.getElementById('texto-alterado');
            const sunIcon = darkModeToggle.querySelector('.fas.fa-sun');
            const moonIcon = darkModeToggle.querySelector('.fas.fa-moon');

            html.classList.toggle('dark');
            body.classList.toggle('dark-mode');


            if (body.classList.contains('dark-mode')) {
                sunIcon.style.display = 'none';
                moonIcon.style.display = 'inline';
                moonIcon.style.color = '#6b21a8';
                texto.textContent = 'Clique na Lua para desativar o Dark-Mode';
            } else {
                sunIcon.style.display = 'inline';
                moonIcon.style.display = 'none';
                texto.textContent = 'Clique no Sol para ativar o Dark-Mode';
            }
        });
    </script> -->
</body>


</html>

</style>
