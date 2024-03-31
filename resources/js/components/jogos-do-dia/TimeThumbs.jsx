import React, { useEffect, useState } from "react";
import axios from "axios";

const TimeThumbs = ({ id, sigla }) => {
    const [isConnected, setIsConnected] = useState(false);
    const [teamData, setTeamData] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    const url = window.REACT_APP_API_BASEURL + "/teams/" + id;

    const fetchData = async () => {
        try {
            const response = await axios.get(url);
            setTeamData(response.data);
        } catch (error) {
            setError(error.message);
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchData();
    }, [id, url]);

    useEffect(() => {
        if (error) {
            const retryTimer = setTimeout(() => {
                fetchData();
            }, 5000); // Retry after 5 seconds
            return () => clearTimeout(retryTimer);
        }
    }, [error]);

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
                src={teamData && (teamData.espnLogo1 || teamData.nbaComLogo1)}
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

export default TimeThumbs;
