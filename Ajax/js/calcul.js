window.addEventListener("load", () => {
    document.querySelector("form").addEventListener("submit", (e) => {
        e.preventDefault();
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = () => {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.querySelector("#resultat").value = xhttp.responseText;
            }
        };
        xhttp.open("GET", "resultat_calcul.php", true);
        xhttp.send();
    });
});
