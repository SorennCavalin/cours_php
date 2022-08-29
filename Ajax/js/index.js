window.addEventListener("load", () => {
    document.querySelector("#action").addEventListener("click", (e) => {
        const xml = new XMLHttpRequest();
        xml.onreadystatechange = () => {
            if (xml.readyState == 4 && xml.status == 200) {
                document.querySelector("#resultat").innerHTML =
                    xml.responseText;
            }
        };
        xml.open("GET", "js/fichier.txt", true);
        xml.send();
    });
});
