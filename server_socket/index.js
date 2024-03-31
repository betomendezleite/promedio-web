const http = require("http");
const axios = require("axios");
const { Server } = require("socket.io");

const server = http.createServer();
const io = new Server(server, {
    cors: {
        origin: "*", // Cambia esto según tus necesidades
    },
});

io.on("connect", (socket) => {
    console.log("Cliente conectado: " + socket.id);

    // Escucha el evento para cargar datos de equipo
    socket.on("loadTeamData", async (teamId) => {
        try {
            const response = await axios.get(
                `http://api-promedio.test/api/teams/${teamId}`
            );
            // Envía los datos al cliente que emitió la solicitud
            socket.emit("teamDataLoaded", response.data);
        } catch (error) {
            console.error("Error al cargar datos del equipo:", error.message);
            // Envía un mensaje de error al cliente
            socket.emit("teamDataError", error.message);
        }
    });
});

const PORT = 5000;
server.listen(PORT, () => {
    console.log(`Servidor escuchando en el puerto ${PORT}`);
});
