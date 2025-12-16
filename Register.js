document.addEventListener("DOMContentLoaded", () => {
    const registerButton = document.getElementById("registerButton");
    registerButton.addEventListener("click", async (event) => {
        event.preventDefault();

        const form = document.getElementById("registerForm");
        const formData = new FormData(form);
        // const formData = Object.fromEntries(formDataObject.entries());

        // const data = await fetch("Register-server-side.php", {
        //     method : "post",
        //     headers: {
        //         "Content-type" : "application/json"
        //     },
        //     body: JSON.stringify({"formData": formData})
        // }).then(rawData => rawData.json());

        const data = await fetch("Register-server-side.php", {
            method : "post",
            body: formData
        }).then(rawData => rawData.json());

        if(data.status == "ok") {
            document.getElementById("username").value = "";
            document.getElementById("password").value = "";
            document.getElementById("statusMessage").innerText = data.message;
        } else {
            document.getElementById("statusMessage").innerText = data.message;
        }
    })
});