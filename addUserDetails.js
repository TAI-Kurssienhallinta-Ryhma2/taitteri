document.addEventListener("DOMContentLoaded", () => {
    const registerButton = document.getElementById("registerButton");
    registerButton.addEventListener("click", async (event) => {
        event.preventDefault();

        const form = document.getElementById("registerForm");
        const formData = new FormData(form);

        const data = await fetch("addUserDetails-server-side.php", {
            method : "post",
            body: formData
        }).then(rawData => rawData.json());

        if(data.status == "ok") {
            window.location.href = "index.php";
        }
    })
});