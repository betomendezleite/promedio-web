import React, { useEffect, useState } from "react";
import axios from "axios";
import ReactDOM from "react-dom/client";
import { format } from "date-fns";

function JogosDoDia() {
    const [bettingOdds, setBettingOdds] = useState(null);

    useEffect(() => {
        const fetchData = async () => {
            const currentDate = new Date();
            //  const formattedDate = format(currentDate, "yyyyMMdd");
            const formattedDate = "20240214";
            const url =
                window.REACT_APP_API_BASEURL + "/game-daily/" + formattedDate;

            try {
                const response = await axios.get(url);
                setBettingOdds(response.data);
            } catch (error) {
                console.error(error);
            }
        };

        fetchData();
    }, []);

    const TimeThumbs = ({ team }) => {
        const [teamData, setTeamData] = useState(null);
        const [loading, setLoading] = useState(true);
        const [error, setError] = useState(null);

        const urlTeam = window.REACT_APP_API_BASEURL + "/teams/" + team;
        useEffect(() => {
            const fetchTime = async () => {
                try {
                    const response = await axios.get(urlTeam);
                    setTeamData(response.data);
                } catch (error) {
                    setError(error.message);
                } finally {
                    setLoading(false);
                }
            };
            fetchTime();
        }, [urlTeam]);

        if (loading) {
            return <p>Cargando datos del equipo...</p>;
        }

        if (error) {
            return <p>Error: {error}</p>;
        }

        return (
            <div className="box_logo_time">
                <img
                    className="w-100"
                    src={
                        teamData && (teamData.espnLogo1 || teamData.nbaComLogo1)
                    }
                    onError={(e) => {
                        e.target.src =
                            "http://127.0.0.1:8000/assets/logo_navbar.png";
                    }}
                />
                <p className="box_nome_time fs_8">
                    {teamData && teamData.teamName}
                </p>
                <p className="color_azul fs_8 text_align_center">
                    {teamData && `CONFERENCIA ${teamData.conferenceAbv}`}
                </p>
            </div>
        );
    };

    const TimeThumbsAway = ({ team }) => {
        const [teamData, setTeamData] = useState(null);
        const [loading, setLoading] = useState(true);
        const [error, setError] = useState(null);

        const urlTeam = window.REACT_APP_API_BASEURL + "/teams/" + team;
        useEffect(() => {
            const fetchTimeAway = async () => {
                try {
                    const response = await axios.get(urlTeam);
                    setTeamData(response.data);
                } catch (error) {
                    setError(error.message);
                } finally {
                    setLoading(false);
                }
            };
            fetchTimeAway();
        }, [urlTeam]);

        if (loading) {
            return <p>Cargando datos del equipo...</p>;
        }

        if (error) {
            return <p>Error: {error}</p>;
        }

        return (
            <div className="box_logo_time">
                <img
                    className="w-100"
                    src={
                        teamData && (teamData.espnLogo1 || teamData.nbaComLogo1)
                    }
                    onError={(e) => {
                        e.target.src =
                            "http://127.0.0.1:8000/assets/logo_navbar.png";
                    }}
                />
                <p className="box_nome_time fs_8">
                    {teamData && teamData.teamName}
                </p>
                <p className="color_azul fs_8 text_align_center">
                    {teamData && `CONFERENCIA ${teamData.conferenceAbv}`}
                </p>
            </div>
        );
    };

    return (
        <div className="content_jogos_dia">
            {Array.isArray(bettingOdds) &&
                bettingOdds.map((game) => (
                    <div className="box_game" key={game.gameID}>
                        <div className="status_game">
                            <p className="fs_12">
                                {` ${game.away} VS ${game.home}`}
                            </p>
                        </div>
                        <div className="box_game_datos">
                            <div>
                                <p className="text_align_center color_azul f_semibold fs_12">
                                    LOCAL
                                </p>
                                <TimeThumbs team={game.teamIDHome} />
                            </div>
                            <div className="pontos_vs">
                                <div className="box_pontos f_semibold fs_8">
                                    <p>95</p>
                                </div>
                                <div>
                                    <h3 className="color_orange_1">VS</h3>
                                    <br />
                                    <img src="assets/calculadora.svg" alt="" />
                                </div>
                                <div className="box_pontos f_semibold fs_8">
                                    <p>108</p>
                                </div>
                            </div>
                            <div>
                                <p className="text_align_center color_azul f_semibold fs_12">
                                    VISITANTE
                                </p>
                                <TimeThumbsAway team={game.teamIDAway} />
                            </div>
                        </div>
                        <div className="w-100">
                            <a
                                href={`/estatisticas/${game.teamIDAway}/${game.teamIDHome}/${game.gameID}`}
                            >
                                <button
                                    id="modal_est"
                                    className="btn_estatiticas"
                                >
                                    VER ESTADISTICAS DO JOGO
                                </button>
                            </a>
                        </div>
                    </div>
                ))}
        </div>
    );
}

export default JogosDoDia;

if (document.getElementById("jogosDoDia")) {
    const Index = ReactDOM.createRoot(document.getElementById("jogosDoDia"));
    Index.render(<JogosDoDia />);
}
