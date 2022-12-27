const likeButtons = document.querySelectorAll('.fa-circle-check');
const dislikeButtons = document.querySelectorAll('.fa-circle-xmark');
const uncertainButtons = document.querySelectorAll('.fa-circle-question');



function incrementStats(eventType) {
    let flag = false;
    const button = this;
    const container = button.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    const data = {checkEvents: 'desc'};
    fetch("/checkEvents", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (response) {
        response.forEach(event => {
            if (event.id_event === Number(id))
                flag = true;
        });

        if (flag)  // flag is visible here
            return;  // exit the function

        fetch(`/${eventType}/${id}`)
            .then(function () {
                button.innerHTML = parseInt(button.innerHTML) + 1;
            });
    });
}




likeButtons.forEach(button => button.addEventListener("click", incrementStats.bind(button, "like")));
dislikeButtons.forEach(button => button.addEventListener("click", incrementStats.bind(button, "dislike")));
uncertainButtons.forEach(button => button.addEventListener("click", incrementStats.bind(button, "uncertain")));
