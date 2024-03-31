<nav>
    <div class="navbar nav">
        <div>
            <img class="logo_desktop" src="{{ asset('landing/assets/img/logo.png') }}" alt="" srcset="">

        </div>
        <div class="menu_desktop">
            <ul>
                <a href="#principal">
                    <li class="btn_link">Inicio</li>
                </a>
                <a href="#quem_somos">
                    <li class="btn_link">Quem Somos?</li>
                </a>
                <a href="#porque_nos">
                    <li class="btn_link">Porque nós?</li>
                </a>
                <a href="#testemunhas">
                    <li class="btn_link">Testemunhos</li>
                </a>
                <a href="#faq">
                    <li class="btn_link">FAQ</li>
                </a>

            </ul>
        </div>
        <div class="menu_desktop_user">
            <ul>
                <div>
                    <a class="" href="{{ url('/login') }}">
                        <li id="btn_user">
                            <i class="icn_btn "></i>LOGIN</span>
                        </li>
                    </a>
                </div>
                <div>
                    <a class="" href="">
                        <li id="btn_user_2">
                            <i class="icn_btn "></i>ASSINE JÁ</span>
                        </li>
                    </a>
                </div>

            </ul>
        </div>
    </div>
    <div class="navbar_mobile">
        <div class="navbar_mobile_cont">
            <div class="menu_toggle">

                <img src="{{ asset('landing/assets/img/menu.png') }}" alt="" srcset="">
            </div>
            <div class="logo_mobile">
                <img class="logo_mob" src="{{ asset('landing/assets/img/logo.png') }}" alt="" srcset="">
            </div>

        </div>

    </div>
    <div class="menu_mobile close_menu">


        <div class="div_close">
            <img class="menu_close" src="{{ asset('landing/assets/img/close.png') }}" alt="" srcset="">
        </div>
        <div>
            <ul>
                <a class="p_5" href="#principal">
                    <li class="btn_link">Inicio</li>
                </a>
                <a class="p_5" href="#quem_somos">
                    <li class="btn_link">Quem Somos?</li>
                </a>
                <a class="p_5" href="#porque_nos">
                    <li class="btn_link">Porque nós?</li>
                </a>
                <a class="p_5" href="#testemunhas">
                    <li class="btn_link">Testemunhos</li>
                </a>
                <a class="p_5" href="#faq">
                    <li class="btn_link">FAQ</li>
                </a>

            </ul>
        </div>
        <div class="mobile_user_btn">
            <a href="{{ url('/login') }}">
                <div> <span>LOGIN</span></div>
            </a>
            <div> <span>ASSINE JÁ</span></div>
        </div>
    </div>
</nav>