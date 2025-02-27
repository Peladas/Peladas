<div class="content flex-grow">

<div class="section h-screen bg-fixed bg-cover bg-center md:bg-right dark:bg-[url('imagens/fundoJgd_md.png')] bg-[url('imagens/fundoJgd_md_branco.png')] md:bg-[url('imagens/fundo_branco.png')] md:dark:bg-[url('imagens/Fundo.png')] flex items-center">
    <div class="md:w-full flex justify-center md:justify-start">
        <div class="h-full text-xl sm:text-2xl flex flex-col justify-center md:pl-8 items-center md:items-start max-w-xl">
            <div class="flex flex-col md:flex-row gap-0 md:gap-2 text-4xl text-left flex-wrap">
                <h1 class="dark:text-yellow-400 text-center md:text-left hyphens-auto py-4 md:py-auto font-bold text-purple-700">Seja Bem-Vindo Jogador!</h1>
            </div>

            <p class="w-auto md:w-full mb-2 md:mb-2 md:text-2xl text-center md:text-left">
            Venha encontrar um lugar para praticar esporte, seja para uma partida com os amigos ou com pessoas novas, temos tudo o que você precisa para aproveitar ao máximo seus esportes favoritos.
            Explore nossas opções e prepare-se para viver grandes partidas!
            </p>
        </div>
    </div>
</div>


    <!--///////// 2 ////-->
    <div class="section h-auto text-xl bg-auto bg-no-repeat relative bg-[#FFFFFF] dark:bg-zinc-800 shadow-sm shadow-zinc-200">

        <!--Imagem de Cima-->
        <img src="/imagens/mini2Jogador_branco.png" class="absolute top-0 right-0 h-80 w-80 invisible md:visible block dark:hidden">
        <img src="imagens/mini_img1.png" class="absolute top-o left-0 h-80 w-80 invisible md:dark:visible hidden dark:block">
        <!--Imagem de Baixo-->
        <img src="/imagens/mini1_branco.png" class="absolute bottom-0 left-5 h-72 w-80 invisible md:visible block dark:hidden">
        <img src="/imagens/mini_img2.png" class="absolute bottom-0 right-5 h-72 w-80 invisible md:dark:visible hidden dark:block">

        <div class="flex flex-col md:flex-row flex-wrap justify-center gap-5 md:gap-16 h-full items-center mt-5">

            <div class="text-center">
                <h1 class="text-center m-5 md:text-3xl text-2xl dark:text-yellow-400 py-3">Quadras</h1>
                <div class="border-solid border-2 p-4 mb-5 w-72">
                    <p class="text-center text-lg md:text-xl">Encontre quadras próximas para diversas modalidades, alugue para uso exclusivo ou crie partidas públicas.
                        Conecte-se com outros jogadores e aproveite ao máximo sua experiência esportiva!</p>
                </div>
                <div class="flex justify-center m-8">
                    <a class="rounded-full transform hover:scale-105 px-3 py-2 bg-transparent dark:text-white border border-gray-300 px-4 py-2 hover:bg-gray-200 hover:text-gray-800 hover:border-gray-400 hover:shadow-lg transform transition-all duration-300"
                    href="<?php echo $user_type === 'jogador' ? '/areas-desportivas' : '/minhas-quadras' ?>">Acessar as Quadras</a>
                </div>
            </div>

            <!-- Bloco de Listas Públicas -->
            <div class="text-center">
                <h1 class="text-center m-5 md:text-3xl text-2xl dark:text-yellow-400 py-3">Listas Públicas</h1>
                <div class="border-solid border-2 p-4 mb-5 w-72">
                    <p class="text-center text-lg md:text-xl">Crie ou participe de partidas públicas, divida os custos e conheça novos jogadores enquanto se diverte! Escolha sua modalidade favorita,
                         marque a partida e aproveite o jogo sem complicações.</p>
                </div>
                <div class="flex justify-center m-8">
                    <a class="rounded-full transform hover:scale-105 px-3 py-2 bg-transparent dark:text-white border border-gray-300 px-4 py-2 hover:bg-gray-200 hover:text-gray-800 hover:border-gray-400 hover:shadow-lg transform transition-all duration-300"
                    href="<?php echo $user_type === 'jogador' ? '/partidas-publicas' : '' ?>">Acessar as Listas Públicas</a>
                </div>
            </div>
        </div>
    </div>


    <!--///////// 3 ////-->
    <div class="section bg-[#F1F5F9] dark:bg-zinc-950 h-auto dark:drop-shadow-2xl p-4">
                <div class="flex flex-col lg:flex-row flex justify-center items-center md:gap-5 gap-10">

                    <div class="w-full md:w-1/2 flex flex-col justify-start flex-wrap">
                        <div>
                            <h1 class="text-center lg:text-left dark:text-yellow-400 ml-auto md:ml-20 text-3xl pt-4">Nossos Objetivos</h1>
                        </div>
                        <div class="w-auto md:w-full flex flex-wrap">
                            <p class="text-xl md:text-2xl md:mt-8 mt-10 text-wrap text-center md:text-left ml-auto md:ml-20 py-6 md:py-0">Facilitamos a vida de praticantes de esportes
                                e empreendedores, promovendo a prática esportiva e apoiando pequenos negócios. Buscamos dar mais visibilidade às quadras,
                                ampliando oportunidades de locação e aumentando o lucro dos locadores.
                                Assim, criamos uma comunidade onde esporte e empreendedorismo se conectam de forma acessível e inovadora.</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-center w-1/2">
                        <img class="h-auto w-auto md:w-4/6 hidden dark:block" src="/imagens/jogador.png">
                        <img class="h-auto w-auto md:w-3/6 block dark:hidden" src="/imagens/image_branco.png">
                    </div>

                </div>

            </div>

</div>
