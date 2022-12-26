const likeButtons = document.querySelectorAll('.fa-circle-check');
const dislikeButtons = document.querySelectorAll('.fa-circle-xmark');
const uncertainButtons = document.querySelectorAll('.fa-circle-question');

let functionExecuted = false;

function incrementStats(eventType) {
    if (functionExecuted) return;

    functionExecuted = true;

    const button = this;
    const container = button.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");


    fetch(`/${eventType}/${id}`)
        .then(function () {
            button.innerHTML = parseInt(button.innerHTML) + 1;
        });
}



likeButtons.forEach(button => button.addEventListener("click", incrementStats.bind(button, "like")));
dislikeButtons.forEach(button => button.addEventListener("click", incrementStats.bind(button, "dislike")));
uncertainButtons.forEach(button => button.addEventListener("click", incrementStats.bind(button, "uncertain")));
