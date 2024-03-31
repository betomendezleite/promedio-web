@extends('template.app')
@section('title', 'PROMEDIO - Analises de Apostas')
@section('content')

<section id="principal" class="principal">
    @include('template.navbars.navbar-landing')
    <div class="text_principal">
        <div class="col_1_principal ">
            <div class="tittle">
                <h1>SENTIU A ADRENALINA DE APOSTAR NO BASQUETE?</h1>
                <p class="par par_mob">
                    Aquela Sensação De Antecipar O Resultado De Uma Partida E Ser Recompensado Por Sua Precisão?
                    Se Você É Um Entusiasta Do Basquete E Quer Elevar Seus Ganhos A Um Novo Nível, Você Veio Ao
                    Lugar
                    Certo.
                </p>
                <div class="principal_btns p_5">
                    <div>
                        <a href="#quem_somos">
                            <button class="btn_principal btn">
                                <span>VER MAIS</span>
                            </button>
                        </a>
                    </div>
                    <div>
                        <button class="btn_sec btn">
                            ASSINE JÁ
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <div class="col_2_principal">
            <img class="img_principal" src="{{ asset('landing/assets/img/player_1.png') }}" alt="" srcset="">
        </div>
    </div>
</section>
<section id="quem_somos" class="quem_somos">
    <div class="deco_quem_1"></div>
    <div class="content_quem">
        <div class="quem_col">
            <img class="w-75" src="{{ asset('landing/assets/img/player_2.png') }}" alt="" srcset="">
        </div>
        <div class="tittle_quem">
            <h1 class="w-100">Conheça A Promedio!</h1>
            <p class="par ">
                Bem-vindo a Promedio nosso site de análise, onde a alta assertividade é a chave para o sucesso!Em
                nossa plataforma, entendemos que fazer apostas no basquete não é apenas uma questão de sorte. É
                sobre análise, conhecimento e tomada de decisões embasadas. É por isso que estamos aqui para
                oferecer a você as melhores análises e insights disponíveis, para que você possa apostar com
                confiança e melhorar seus lucros.
            </p>


            <button class="btn_sec btn">
                ASSINE JÁ
            </button>

        </div>
    </div>
    <div class="deco_quem_2"></div>
</section>
<section id="porque_nos" class="porque_nos">
    <div class="porque_content">
        <div class="porque_box_text">

        </div>
        <h1 class="porque_box_text_mobile">
            Por Que Escolher A Promedio?
        </h1>
        <img class="img_porque" src="{{ asset('landing/assets/img/porq_content.png') }}" alt="" srcset="">
        <div class="content_tablet_porque">
            <div class="table_col_1">
                <img class="w-100" src="{{ asset('landing/assets/img/porque_tablet_1.png') }}" alt="" srcset="">
            </div>
            <div class="table_col_2">
                <img class="w-100" src="{{ asset('landing/assets/img/porque_tablet_2.png') }}" alt="" srcset="">
            </div>
        </div>
        <div class="content_mobile_porque">
            <img class="w-100" src="{{ asset('landing/assets/img/porque_content_mobile.png') }}" alt="" srcset="">
        </div>
    </div>
</section>
<section id="testemunhas" class="testemunhas">
    <div class="col_1_test">
        <img class="w-100" src="{{ asset('landing/assets/img/ball.png') }}" alt="" srcset="">
    </div>
    <div class="col_2_test">
        <h3 class="test_tittle">Testemunhos</h3>
        <div class="sect_test">
            <div>
                <div class="box_test">
                    <div class="">
                        <img class="profile_pic" src="{{ asset('landing/assets/img/test_3.jpg') }}" alt="" srcset="">
                    </div>
                    <div>
                        <p class="declaracao">
                            Conheci o site da Promédio e posso dizer é muito “top”, dá informações precisas em um só
                            clique e ajuda bastante nas análises, E digo mais e algo que vale a pena para quem
                            analisa e quer aperfeiçoar além de ajudar nas análises agrega conhecimento.
                        </p>

                        <p class="sub_tittle">Gleison</p>
                        <!--            <p class="sub_tittle">PROFISSAO</p> -->
                    </div>
                </div>
                <div class="box_test">
                    <div class="">
                        <img class="profile_pic" src="{{ asset('landing/assets/img/test_2.jpg') }}" alt="" srcset="">
                    </div>
                    <div>
                        <p class="declaracao">
                            O site tem uma “interface” intuitiva bem fácil de entender, traz informações sobre times
                            e jogadores conforme eu esperava.
                        </p>

                        <p class="sub_tittle">Isabelli</p>
                        <!--                     <p class="sub_tittle">PROFISSAO</p> -->
                    </div>
                </div>
            </div>
            <div class="seg_sect_test">
                <div class="box_test">
                    <div class="">
                        <img class="profile_pic" src="{{ asset('landing/assets/img/test_1.jpeg') }}" alt="" srcset="">
                    </div>
                    <div>
                        <p class="declaracao">
                            Site bem elucidativo, com bastante informações sobre as estatísticas dos times ,
                            jogadores , acesso fluido , leve e comprometido com seu público .

                            Recomendo !!!
                        </p>

                        <p class="sub_tittle mt">Gilmar</p>
                        <!--      <p class="sub_tittle">PROFISSAO</p> -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="faq" class="faq">
    <img class="w-100" src="{{ asset('landing/assets/img/faq.png') }}" alt="" srcset="">
    <div class="box_faq">
        <div>
            <div class="faq_item">
                <button class="btn_collapse" onclick="toggleCollapse('collapseContent1')">
                    A Promedio me ajudará nas apostas?
                </button>
                <div class="collapse-content" id="collapseContent1">
                    <p class="par">
                        Com análises especializadas, previsões confiáveis e suporte, você se tornará um apostador um
                        apostador bem-sucedido!
                    </p>
                </div>
            </div>

            <div class="faq_item">
                <button class="btn_collapse" onclick="toggleCollapse('collapseContent2')">
                    A Promedio possui suporte, caso precise?
                </button>
                <div class="collapse-content" id="collapseContent2">
                    <p class="par">
                        Valorizamos nossos usuários e estamos aqui para ajudá-lo em todas as etapas.
                    </p>
                </div>
            </div>

            <div class="faq_item">
                <button class="btn_collapse" onclick="toggleCollapse('collapseContent3')">
                    A Promedio realmente tem análise especializada?
                </button>
                <div class="collapse-content" id="collapseContent3">
                    <p class="par">
                        Com nossas análises, você terá insights valiosos sobre os times e jogadores.
                    </p>
                </div>
            </div>

            <div class="faq_item">
                <button class="btn_collapse" onclick="toggleCollapse('collapseContent4')">
                    A Promedio tem uma boa interface?
                </button>
                <div class="collapse-content" id="collapseContent4">
                    <p class="par">Sabemos que a facilidade de uso é essencial. Nossa plataforma foi projetada com
                        uma interface intuitiva,
                        para que você possa navegar facilmente pelas análises, estatísticas e informações
                        relevantes.
                        Aproveite uma experiência fluida e intuitiva enquanto planeja suas entradas estratégias de
                        apostas.</p>
                </div>
            </div>

        </div>
    </div>
    <div class="w-100 text_align_center">
        <h2 class="text_white">NOSSAS REDES SOCIAIS</h2>
        <div class="">
            <a href="https://twitter.com/PromedioBrasil">
                <img class="logo_link p_5" src="{{ asset('landing/assets/img/twitter.png') }}" alt="" srcset="">
            </a>
            <a href="https://www.instagram.com/promediobrazil/">
                <img class="logo_link p_5" src="{{ asset('landing/assets/img/instagram.png') }}" alt="" srcset="">
            </a>
        </div>
    </div>

    <div class="w-100 text_align_center footer_copy">
        <h5 class="footer_copy ">DEREITOS RESERVADOS - PROMEDIO - 2023</h5>

    </div>
</section>


@endsection
@section('scripts')
<script src="{{ asset('landing/js/main.js') }}"></script>
@endsection