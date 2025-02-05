        <!--///////// 1 ////-->

        <div class="size-full">

            <div class="h-screen section bg-fixed bg-cover bg-center md:bg-right bg-[url('imagens/fundBrancoLoc.png')] md:bg-[url('imagens/teste.png')] dark:bg-[url('imagens/fundoLocador_md.png')] md:dark:bg-[url('imagens/fundo_locador.png')] shadow-2xl dark:bg-zinc-900">
                <div class="md:ml-16 md:w-1/2 flex justify-center items-center md:justify-start">
                    <div class="flex flex-col justify-center items-center md:justify-start md:items-start pt-20">
                            <h1 class="dark:text-yellow-400 text-4xl md:text-left">Seja Bem-Vindo Locador!</h1>

                            <p class="w-auto md:w-4/6 mt-12 md:mt-8 mb-2 md:mb-2 md:text-2xl text-xl text-center md:text-left">Simplifique a gestão das suas quadras esportivas com nossa plataforma!
                            Gerencie reservas de forma intuitiva, aumente a visibilidade e a ocupação, e alcance novos públicos.
                            Otimize operações e foque em oferecer uma experiência excepcional aos seus clientes. Leve seu negócio esportivo a outro nível!</p>
                    </div>
                </div>
            </div>

            <!--///////// 2 //// -->

            <div class="section h-auto text-xl bg-auto relative bg-[#FFFFFF] dark:bg-zinc-800 shadow-md shadow-zinc-200">

                <!--modo Dark-->
                <img src="imagens/locador_dark.png" class="absolute bottom-0 left-8 z-0 h-5/6 invisible md:visible hidden dark:block">

                <!--modo branco-->
                <img src="imagens/mini2_branco.png" class="absolute bottom-0 left-100 z-0 w-80 invisible md:visible block dark:hidden">

                <div class="flex flex-col md:flex-row justify-center gap-5 md:gap-40 h-auto md:h-full items-center mt-5">

                    <div class="text-center z-40">
                        <h1 class="text-center m-5 md:text-3xl text-2xl dark:text-yellow-400 py-3">Suas Quadras</h1>
                        <div class="border-solid border-2 border-zinc-200 dark:bg-zinc-800 bg-gray-50 p-4 mb-5 w-72 rounded-lg z-40">
                            <p class="text-center text-lg md:text-xl">Gerencie suas quadras com facilidade! Acompanhe suas reservas, tenha controle total do seu negócio e maximize seus ganhos com o Peladas. Acesse agora suas quadras.</p>
                        </div>
                        <div class="flex justify-center m-8">
                            <a class="rounded-full transform hover:scale-105 px-3 py-2 bg-transparent dark:text-white border border-gray-300 px-4 py-2 hover:bg-gray-200 hover:text-gray-800 hover:border-gray-400 hover:shadow-lg transform transition-all duration-300"
                            href="<?php echo $user_type === 'jogador' ? '/areas-desportivas' : '/minhas-quadras' ?>">Suas Quadras</a>
                        </div>
                    </div>

                    <div class="text-center">
                        <h1 class="text-center m-5 md:text-3xl text-2xl dark:text-yellow-400 py-3">Sua Empresa</h1>
                        <div class="border-solid border-2 border-zinc-200 dark:bg-zinc-800 bg-gray-50 p-4 mb-5 w-72 rounded-lg z-40">
                            <p class="text-center text-lg md:text-xl">Acesse aqui os dados da sua empresa e personalize tudo como quiser! Mantenha suas informações sempre atualizadas. Faça sua gestão de forma simples e eficiente com o Peladas!</p>
                        </div>
                        <div class="flex justify-center m-8">
                            <a class="rounded-full transform hover:scale-105 px-3 py-2 bg-transparent dark:text-white border border-gray-300 px-4 py-2 hover:bg-gray-200 hover:text-gray-800 hover:border-gray-400 hover:shadow-lg transform transition-all duration-300"
                            href="<?php echo $user_type === 'jogador' ? '/perfil-jogador' : '/perfil-locador' ?>">
                                Meu Perfil</a>
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
