import React from "react";
import { createRoot } from "react-dom/client";

function PosiciosGraficosJogador() {
    var ruta = window.location.pathname;

    var partes = ruta.split("/");

    var idGame = partes[partes.length - 1];

    return (
        <div className="card_body">
            <div style="display: flex; justify-content: center;">
                <div>
                    <button
                        type="button"
                        data-tabid="8"
                        onclick="openTab(event, 'tab8')"
                        className="btn_ter btn "
                    >
                        Local
                    </button>
                </div>
                <div>
                    <button
                        type="button"
                        data-tabid="9"
                        onclick="openTab(event, 'tab9')"
                        className="btn_ter btn"
                    >
                        Visitante
                    </button>
                </div>
            </div>
            <div id="tab8" style="display: grid; grid-template-columns: 1fr;">
                <div style="display: grid; grid-template-columns: 200px 1fr; margin: 40px;">
                    <div className="box_back_logo ">
                        <div>
                            <div className="box_logo_dentro">
                                <img
                                    className="h_100"
                                    src="{{ $local['espnLogo1'] ?? '' }}"
                                    alt=""
                                    srcset=""
                                />
                            </div>

                            <div
                                className="box_back_dados w_100"
                                style="width: 100% !important;"
                            >
                                <div
                                    className="box_back_dados_cont_2"
                                    style="width: 100% !important;"
                                >
                                    <div className="col_1 grid_center_vertical ">
                                        <div>
                                            <div className="drop_down">
                                                <button className="dropdow_btn">
                                                    MÉDIA PONTOS
                                                    <img
                                                        src="{{asset('assets/arrow_drop_down.svg')}}"
                                                        alt="Flecha hacia abajo"
                                                    />
                                                </button>
                                                <div className="dropdow_menu_btn">
                                                    <ul>
                                                        <li>Link Nome</li>
                                                        <li>Link Nome</li>
                                                        <li>Link Nome</li>
                                                        <li>Link Nome</li>
                                                        <li>Link Nome</li>
                                                        <li>Link Nome</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col_1" style="margin-left: 20px;">
                        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr  1fr 1fr;">
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                            <div className="dados_single_med_temp">
                                <div className="dados_single_med_temp_cont">
                                    <div>
                                        <p className="fs_14">JOGOS</p>
                                    </div>
                                    <div>
                                        <p className="fs_14">9</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 250px 1fr; margin: 40px;">
                    <div className="posicionesGraficos">
                        <div className="first-row">
                            <div>
                                <div>
                                    <img
                                        className="imgPosJugador"
                                        src="{{asset('assets/jugador.png')}}"
                                    />
                                    <p className="nomPosJugador">NOME POS</p>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <img
                                        className="imgPosJugador"
                                        src="{{asset('assets/jugador.png')}}"
                                    />
                                    <p className="nomPosJugador">NOME POS</p>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <img
                                        className="imgPosJugador"
                                        src="{{asset('assets/jugador.png')}}"
                                    />
                                    <p className="nomPosJugador">NOME POS</p>
                                </div>
                            </div>
                        </div>
                        <div className="second-row">
                            <div>
                                <div className="selectPosJugador">
                                    <img
                                        className="imgPosJugador"
                                        src="{{asset('assets/jugador.png')}}"
                                    />
                                    <p className="nomPosJugador">NOME POS</p>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <img
                                        className="imgPosJugador"
                                        src="{{asset('assets/jugador.png')}}"
                                    />
                                    <p className="nomPosJugador">NOME POS</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
            <div
                id="tab9"
                style="display: flex; justify-content: center; margin: 40px; display: none;"
            >
                Visitante
            </div>
        </div>
    );
}

export default PosiciosGraficosJogador;

createRoot(document.getElementById("projecoesReact")).render(
    <PosiciosGraficosJogador />
);
