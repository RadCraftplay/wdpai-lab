const search = document.querySelector("input[placeholder=\"Search...\"]");
const list = document.querySelector("tbody");
const pagination = document.querySelector("#pagination");
const searchButton = document.querySelector("#search-button");

searchButton.addEventListener("click", function (_) {
    lookup(search.value);
});

search.addEventListener("keyup", function (event) {
    if (event.key !== "Enter") {
        return;
    }

    event.preventDefault();
    lookup(this.value);
});

function lookup(query) {
    if (query === "") {
        location.href = window.location.href;
        return;
    }

    const data = {
        search: query
    };

    fetch("/search", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    }).then(function (response){
        return response.json()
    }).then(function (servers) {
        pagination.style.visibility = "collapse";
        list.innerHTML = "";
        loadServers(servers);
    });
}

function loadServers(servers) {
    servers.forEach(server => {
        console.log(server);
        createServer(server);
    });
}

function createServer(server) {
    const template = document.querySelector("#server-template");
    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `public/img/svg/server-types/${server.serverTypeImageName}`;

    const title = clone.querySelector(".server-entry");
    title.innerHTML = server.title;

    const links = clone.querySelectorAll('a');
    links.forEach(link =>
        link.href = `/server?id=${server.id}`
    );

    list.appendChild(clone);
}
