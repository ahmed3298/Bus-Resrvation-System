
  function createCards(cardData) {
  const container = document.getElementById("card-container");
  container.innerHTML = ""; // clear container before adding new cards
  for (let i = 0; i < cardData.length; i++) {
    let newCard = document.createElement("div");
    newCard.classList.add("card");
    newCard.style.width = "18rem";
    let img = document.createElement("img");
    img.src = "bus.png";
    img.classList.add("card-img-top");
    img.alt = "bus";
	img.style = "width: inherit";
    let cardBody = document.createElement("div");
    cardBody.classList.add("card-body");
    let title = document.createElement("h5");
    title.classList.add("card-title");
    title.innerHTML = "Booking";
    let list = document.createElement("ul");
    let name = document.createElement("li");
    name.innerHTML = cardData[i].name;
    let route = document.createElement("li");
    route.innerHTML = cardData[i].route;
    let departure_date = document.createElement("li");
    date.innerHTML = cardData[i].departure_date;
    let departure_time = document.createElement("li");
    time.innerHTML = cardData[i].departure_time;

    list.appendChild(name);
    list.appendChild(route);
    list.appendChild(departure_date);
    list.appendChild(departure_time);

    let button = document.createElement("a");
    button.classList.add("btn", "btn-primary");
    button.href = "#";
    button.innerHTML = "Cancel Booking";

    cardBody.appendChild(title);
    cardBody.appendChild(list);
    cardBody.appendChild(button);
    newCard.appendChild(img);
    newCard.appendChild(cardBody);
    container.appendChild(newCard);
  }
}

fetch('get_data.php')
.then(response => response.json())
.then(data => createCards(data));