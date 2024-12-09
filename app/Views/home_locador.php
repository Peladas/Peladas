        <!--///////// 1 ////-->

        <div class="content flex-grow">

            <div class="section sm:h-full bg-fixed bg-cover bg-center md:bg-right bg-[url('imagens/fundBrancoLoc.png')] md:bg-[url('imagens/teste.png')] dark:bg-[url('imagens/fundoLocador_md.png')] md:dark:bg-[url('imagens/fundo_locador.png')] shadow-2xl dark:bg-zinc-900">
                <div class="h-[680px] md:ml-16 md:w-1/2 flex justify-center md:justify-start">
                    <div class="text-xl sm:text-2xl flex flex-col justify-center py-10 p-4 md:p-0">
                        <div class="flex flex-col md:flex-row gap-0 md:gap-2 text-4xl text-left flex-wrap">
                            <h1 class="dark:text-yellow-400 text-center md:text-left hyphens-auto md:py-auto">Seja Bem-Vindo Locador!</h1>
                        </div>

                        <p class="w-auto md:w-[500px] mt-12 md:mt-8 mb-2 md:mb-2 md:text-2xl text-center md:text-left">Simplifique a gestão das suas quadras esportivas com nossa plataforma!
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

                <div class="flex flex-col md:flex-row justify-center gap-5 md:gap-[70px] h-auto md:h-full items-center mt-5">

                    <div class="text-center z-40">
                        <h1 class="text-center m-5 md:text-3xl text-2xl dark:text-yellow-400 py-3">Suas Quadras</h1>
                        <div class="border-solid border-2 border-zinc-200 dark:bg-zinc-800 bg-gray-50 p-4 mb-5 w-72 rounded-lg z-40">
                            <p class="text-center text-lg md:text-xl">Pratique seu esporte favorito encontrando ou criando partidas públicas e dividindo o
                                custo da quadra com outros jogadores que compartilham a mesma paixão. Divirta-se, faça novas amizades e aproveite ao máximo
                                cada momento enquanto joga!</p>
                        </div>
                        <div class="flex justify-center m-8">
                            <a color="yellow" class="transform hover:scale-105 px-3 py-2 bg-transparent text-gray-700 border border-gray-300 px-4 py-2
                             hover:bg-gray-200 hover:text-gray-800 hover:border-gray-400 hover:shadow-lg transform transition-all duration-300" href="<?php echo $user_type === 'jogador' ? '/areas_desportivas' : '/minhas-quadras' ?>">Acessar suas Quadras</a>
                        </div>
                    </div>

                    <div class="text-center">
                        <h1 class="text-center m-5 md:text-3xl text-2xl dark:text-yellow-400 py-3">Sua Empresa</h1>
                        <div class="border-solid border-2 border-zinc-200 dark:bg-zinc-800 bg-gray-50 p-4 mb-5 w-72 rounded-lg z-40">
                            <p class="text-center text-lg md:text-xl">Encontre quadras esportivas próximas para alugar e aproveite para organizar partidas públicas
                                ou reservar para uso exclusivo. Conecte-se com amigos, faça novos contatos e desfrute ao máximo de sua experiência esportiva em um
                                ambiente divertido!</p>
                        </div>
                        <div class="flex justify-center m-8">
                            <a class="transform hover:scale-105 px-3 py-2 bg-transparent text-gray-700 border border-gray-300 px-4 py-2 hover:bg-gray-200 hover:text-gray-800 hover:border-gray-400 hover:shadow-lg transform transition-all duration-300">Acessar suas Quadras</a>
                        </div>

                    </div>

                </div>
            </div>

            <!--///////// 3 ////-->
            <div class="section bg-[#F1F5F9] dark:bg-zinc-950 h-auto dark:drop-shadow-2xl p-4">
                <div class="flex flex-col lg:flex-row flex justify-center gap-10 items-center md:gap-64">

                    <div class="w-full md:w-auto flex flex-col justify-start flex-wrap">
                        <div>
                            <h1 class="text-center lg:text-left dark:text-yellow-400 ml-auto md:ml-20 text-3xl pt-4">Nossos Objetivos</h1>
                        </div>
                        <div class="w-auto md:w-[600px] flex flex-wrap">
                            <p class="text-xl md:text-2xl md:mt-8 mt-6 text-wrap text-center md:text-left ml-auto md:ml-20 py-6 md:py-0">Facilitamos a vida de praticantes de esportes
                                e empreendedores, promovendo a prática esportiva e apoiando pequenos negócios. Buscamos dar mais visibilidade às quadras,
                                ampliando oportunidades de locação e aumentando o lucro dos locadores.
                                Assim, criamos uma comunidade onde esporte e empreendedorismo se conectam de forma acessível e inovadora.</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-center">
                        <img class="h-auto md:h-[500px] w-auto md:w-[500px] hidden dark:block" src="/imagens/jogador.png">
                        <img class="h-auto md:h-[500px] w-auto md:w-[500px] block dark:hidden" src="/imagens/image_branco.png">
                    </div>

                </div>

            </div>

        </div>
