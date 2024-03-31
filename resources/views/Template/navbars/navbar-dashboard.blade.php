<nav>
    <div class="nav_desktop_panel">
        <div class="menu_desktop_panel">
            <div class="align_center">
                <a href="jogo-do-dia.html">
                    <button class="btn_small fs_14 color_white"><span><img src="{{ asset('assets/sports_basketball.svg') }}" alt="" srcset=""></span> Jogos do Día</button>
                </a>
            </div>
            <div class="align_center">
                <a href="calculadora.html">
                    <button class="btn_small fs_14 color_white"><span><img src="{{ asset('assets/calculate.svg') }}" alt="" srcset=""></span> Calculadora</button>
                </a>
            </div>
        </div>
        <div class="menu_mobile_panel">
            <img class="menu_toggle" src="{{ asset('assets/menu.png') }}" alt="" srcset="">
            <div class="menu_mobile close_menu">
                <div class="align_end p_3">
                    <img class="menu_close" src="{{ asset('assets/close.png') }}" alt="" srcset="">
                </div>
                <div class="align_center">
                    <a href="jogo-do-dia.html">
                        <button class="btn_small fs_13 color_white"><span><img src="{{ asset('assets/sports_basketball.svg') }}" alt="" srcset=""></span> Jogos do Día</button>
                    </a>
                </div>
                <div class="align_center">
                    <button class="btn_small fs_13 color_white"><span><img src="{{ asset('assets/calculate.svg') }}" alt="" srcset=""></span> Calculadora</button>
                </div>
            </div>
        </div>
        <div class="text_align_center">
            <a href="#">
                <img src="{{ asset('assets/logo_navbar.png') }}" alt="" srcset="">
            </a>
        </div>
        <div>
            <div class="align_end">
                <button class="btn_small fs_13 color_white btn_dropdown">
                    <span><img src="{{ asset('assets/account_circle.svg') }}" alt="" srcset=""></span> Nome
                    <span><img class="arrow_icon" src="{{ asset('assets/arrow_drop_down.svg') }}" alt="" srcset=""></span>
                </button>
                <div class="dropdow_menu" id="dropdownMenu">
                    <ul>

                        <a href="atualizar-perfil.html">
                            <li class="dropdown_link">
                                <span>Atualizar Perfil</span>
                            </li>
                        </a>
                        <a href="/settings">
                            <li class="dropdown_link">
                                <span>Configurações</span>
                            </li>
                        </a>
                        <a href="/logout">
                            <li class="dropdown_link">
                                <span>Sair</span>
                            </li>
                        </a>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</nav>