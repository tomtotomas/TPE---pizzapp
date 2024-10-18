document.getElementById('logout').addEventListener('click', function() {
    fetch('logout.php', {
        method: 'POST',
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'index.php';
        } else {
            console.error('Error al cerrar sesión:', data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});