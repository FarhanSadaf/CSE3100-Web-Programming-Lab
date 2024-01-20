const filename = "./data.json";

// After the DOM is loaded
document.addEventListener("DOMContentLoaded", function() {
    // Click on the first li
    document.querySelector(".menu li").click();
});

// Check if #flight-btn is clicked
document.getElementById("flight-btn").addEventListener("click", function() {
    // Make #flight-btn selected
    selectItem("flight-btn");
    
    // Get data from data.json
    let data = parseData(filename, "flight");
    
    // Change the content of #title and #description
    document.getElementById("title").innerHTML = data["title"];
    document.getElementById("description").innerHTML = data["description"];
});

// Check if #city-btn is clicked
document.getElementById("city-btn").addEventListener("click", function() {
    // Make #city-btn selected
    selectItem("city-btn");

    // Get data from data.json
    let data = parseData(filename, "city");

    // Change the content of #title and #description
    document.querySelector("#title").innerHTML = data["title"];
    document.querySelector("#description").innerHTML = data["description"];
    });

// Check if #island-btn is clicked
document.getElementById("island-btn").addEventListener("click", function() {
    // Make #island-btn selected
    selectItem("island-btn");

    // Get data from data.json
    let data = parseData(filename, "island");

    // Change the content of .col-6.col-s-9
    document.querySelector(".col-6.col-s-9 h1").innerHTML = data["title"];
    document.querySelector(".col-6.col-s-9 p").innerHTML = data["description"];
});

// Check if #food-btn is clicked
document.getElementById("food-btn").addEventListener("click", function() {
    // Make #food-btn selected
    selectItem("food-btn");

    // Get data from data.json
    let data = parseData(filename, "food");

    // Change the content of .col-6.col-s-9
    document.querySelector(".col-6.col-s-9 h1").innerHTML = data["title"];
    document.querySelector(".col-6.col-s-9 p").innerHTML = data["description"];
});

function selectItem(id) {
    // Remove .selected class from all li
    document.querySelectorAll(".menu li").forEach(function(li) {
        li.classList.remove("selected");
    });

    // Add .selected class to the clicked li
    document.getElementById(id).classList.add("selected");
}

function parseData(filename, key) {
    let request = new XMLHttpRequest();
    request.open("GET", filename, false);
    request.send(null);
    let my_JSON_object = JSON.parse(request.responseText);
    return my_JSON_object[key];
}