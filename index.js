document.addEventListener("DOMContentLoaded", () => {
    const loginButton = document.getElementById("loginButton");
    loginButton.addEventListener("click", async (event) => {
        event.preventDefault();
        
        const form = document.getElementById("login-form");
        const formData = new FormData(form);

        const data = await fetch("index-server-side.php", {
            method : "post",
            body: formData
        }).then(rawData => rawData.json());

        if(data.status == "ok") {
            window.location.href = `mainPage.php?user_id=${data.user_id}`;
        } else {
            document.getElementById("messageStatus").innerText = data.message;
        }
    });
});