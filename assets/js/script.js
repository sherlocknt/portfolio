document.addEventListener("DOMContentLoaded", function() {
    const likeButtons = document.querySelectorAll(".btn");

    likeButtons.forEach(button => {
        button.addEventListener("click", function() {
            const imageId = this.getAttribute("data-image-id");
            const likesCountElement = this.parentElement.querySelector(".likes-count");

            fetch("like.php", {
                method: "POST",
                body: JSON.stringify({ imageId }),
                headers: {
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                likesCountElement.textContent = `${data.likes} likes`; 
            });
        });
    });
});
