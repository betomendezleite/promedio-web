import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom/client";
import "./News.css";
function NewsHoje() {
    const [noticias, setNoticias] = useState(null);

    const url = window.REACT_APP_API_BASEURL + "/news";
    useEffect(() => {
        const fecthNews = async () => {
            const options = {
                method: "GET",
                url: url,
            };
            try {
                const response = await axios.request(options);
                setNoticias(response.data);
                console.log(response.data);
            } catch (error) {
                console.error(error);
            }
        };

        fecthNews();
    });

    return (
        <>
            <h1 class="fs_16 color_orange_1 text_align_center f_medium">
                NOTICIAS DO DÍA
            </h1>
            {Array.isArray(noticias) &&
                noticias.map((noticia) => (
                    <div key={noticia.id}>
                        <div className="adorBoxNew"></div>
                        <div className="boxNews">
                            <center>
                                {" "}
                                <div className="box_player_min">
                                    <div className="box_player_min_cont">
                                        <img
                                            className="h_100"
                                            src={noticia.image}
                                            alt=""
                                        />
                                    </div>
                                </div>
                            </center>

                            <p className="titleNews">{noticia.title}</p>

                            <div>
                                <a href={noticia.link} target="_blank">
                                    <button className="btnNews">
                                        Ver Mais
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                ))}
        </>
    );
}

export default NewsHoje;

if (document.getElementById("newsDay")) {
    const Index = ReactDOM.createRoot(document.getElementById("newsDay"));

    Index.render(<NewsHoje />);
}
