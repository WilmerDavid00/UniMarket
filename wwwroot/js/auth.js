document.getElementById("registerForm").addEventListener("submit", function(e) {
    e.preventDefault();
    fetch("/User/Register", {
        method: "POST",
        body: JSON.stringify({
            cedula: document.getElementById("cedula").value,
            name: document.getElementById("name").value,
            lastname: document.getElementById("lastname").value,
            carrera: document.getElementById("carrera").value,
            email: document.getElementById("email").value,
            password: document.getElementById("password").value,
            rol: document.getElementById("rol").value
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

const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('registro') && urlParams.get('registro') === 'exitoso') {
            document.getElementById('mensajeExito').style.display = 'block';
        }
        setTimeout(() => {
            mensajeExito.style.display = 'none';
        }, 5000);
        history.replaceState({}, document.title, window.location.pathname);