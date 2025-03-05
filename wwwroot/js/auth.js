document.getElementById("registerForm").addEventListener("submit", function(e) {
    e.preventDefault();
    fetch("/User/Register", {
        method: "POST",
        body: JSON.stringify({
            name: document.getElementById("name").value,
            email: document.getElementById("email").value,
            password: document.getElementById("password").value
        }),
        headers: { "Content-Type": "application/json" }
    }).then(res => res.json()).then(data => alert(data.message));
});

document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();
    fetch("/User/Login", {
        method: "POST",
        body: JSON.stringify({
            email: document.getElementById("email").value,
            password: document.getElementById("password").value
        }),
        headers: { "Content-Type": "application/json" }
    }).then(res => res.json()).then(data => alert(data.message));
});