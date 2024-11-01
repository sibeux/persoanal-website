

async function playSong() {
    var url = document.getElementById("song-url").value;
    var audioPlayer = document.getElementById("audio-player");

    if (url) {
        /***
         * pokoknya kalau pakai method yang ada fetch gitu2,
         * harus pakai async await, karena fetch itu asynchronous
         ***/
        audioPlayer.src = await checkUrlFromDrive(url);
        audioPlayer.play();
    } else {
        alert("Silakan masukkan URL lagu.");
    }
}

function checkUrlFromDrive(urlDb) {
    // Fetch the Google Drive API key
    return fetch(
        "https://sibeux.my.id/cloud-music-player/database/mobile-music-player/api/gdrive_api"
    )
        .then((response) => response.json())
        .then((apiData) => {
            const gdriveApiKey = apiData[0].gdrive_api;

            if (urlDb.includes("drive.google.com")) {
                const regExp = /\/d\/([a-zA-Z0-9_-]+)/;
                const matches = urlDb.match(regExp);
                if (matches && matches[1]) {
                    return `https://www.googleapis.com/drive/v3/files/${matches[1]}?alt=media&key=${gdriveApiKey}`;
                }
            } else if (urlDb.includes("www.googleapis.com")) {
                const regExp = /files\/([a-zA-Z0-9_-]+)\?/;
                const matches = urlDb.match(regExp);
                if (matches && matches[1]) {
                    return `https://www.googleapis.com/drive/v3/files/${matches[1]}?alt=media&key=${gdriveApiKey}`;
                }
            }

            return urlDb;
        })
        .catch((error) => {
            console.error("Error fetching Google Drive API key:", error);
            return urlDb;
        });
}
