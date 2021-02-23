import axios from "axios";
import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";

function Create(props) {
    const [message, setMessage] = useState("");
    const [bands, setBands] = useState([]);
    const [albums, setAlbums] = useState([]);
    const [bandId, setBandId] = useState("");
    const [albumId, setAlbumId] = useState("");
    const [title, setTitle] = useState("");
    const [body, setBody] = useState("");
    const [errors, setErros] = useState([]);

    const request = {
        band: bandId,
        album: albumId,
        title,
        body,
    };

    const getBands = async () => {
        let response = await axios.get("/bands/table");
        setBands(response.data);
    };

    const getAlbumBySelectedBand = async (e) => {
        setBandId(e.target.value);
        let response = await axios.get(
            `/albums/get-album-by-${e.target.value}`
        );
        setAlbums(response.data);
    };

    const store = async (e) => {
        e.preventDefault();
        try {
            let respose = await axios.post(props.endpoint, request);
            setMessage(respose.data.message);
            setErros([]);
            setBandId("");
            setAlbumId("");
            setTitle("");
            setBody("");
        } catch (error) {
            setErros(error.response.data.errors);
        }
    };

    useEffect(() => {
        getBands();
    }, []);

    return (
        <>
            {message && <div className="alert alert-success">{message}</div>}
            <div className="card">
                <div className="card-header">{props.title}</div>
                <div className="card-body">
                    <form onSubmit={store}>
                        <div className="form-group">
                            <label htmlFor="band">Band</label>
                            <select
                                value={bandId}
                                onChange={getAlbumBySelectedBand}
                                name="band"
                                id="band"
                                className="form-control"
                            >
                                <option value={null}>Choose a band</option>
                                {bands.map((band) => {
                                    return (
                                        <option key={band.id} value={band.id}>
                                            {band.name}
                                        </option>
                                    );
                                })}
                            </select>
                            {errors.band ? (
                                <div className="mt-2 text-danger">
                                    {errors.band[0]}
                                </div>
                            ) : (
                                ""
                            )}
                        </div>

                        {albums.length ? (
                            <div className="form-group">
                                <label htmlFor="album">Album</label>
                                <select
                                    value={albumId}
                                    name="album"
                                    id="album"
                                    className="form-control"
                                    onChange={(e) => setAlbumId(e.target.value)}
                                >
                                    <option value={null}>Choose a album</option>
                                    {albums.map((album) => {
                                        return (
                                            <option
                                                key={album.id}
                                                value={album.id}
                                            >
                                                {album.name}
                                            </option>
                                        );
                                    })}
                                </select>
                                {errors.album ? (
                                    <div className="mt-2 text-danger">
                                        {errors.album[0]}
                                    </div>
                                ) : (
                                    ""
                                )}
                            </div>
                        ) : (
                            ""
                        )}

                        <div className="form-group">
                            <label htmlFor="title">Title</label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                className="form-control"
                                value={title}
                                onChange={(e) => setTitle(e.target.value)}
                            />
                            {errors.title ? (
                                <div className="mt-2 text-danger">
                                    {errors.title[0]}
                                </div>
                            ) : (
                                ""
                            )}
                        </div>

                        <div className="form-group">
                            <label htmlFor="title">Lyric</label>
                            <textarea
                                rows="10"
                                type="text"
                                name="lyric"
                                id="lyric"
                                className="form-control"
                                value={body}
                                onChange={(e) => setBody(e.target.value)}
                            ></textarea>
                            {errors.body ? (
                                <div className="mt-2 text-danger">
                                    {errors.body[0]}
                                </div>
                            ) : (
                                ""
                            )}
                        </div>

                        <button type="submit" className="btn btn-primary">
                            Create
                        </button>
                    </form>
                </div>
            </div>
        </>
    );
}

export default Create;

if (document.getElementById("create-lyric")) {
    var item = document.getElementById("create-lyric");
    ReactDOM.render(
        <Create
            endpoint={item.getAttribute("endpoint")}
            title={item.getAttribute("title")}
        />,
        item
    );
}
