document.addEventListener('DOMContentLoaded', () => {
  const user = localStorage.getItem('usuarioNombre'); 
  if (user) {
    document.getElementById('userInfo').style.display = 'flex';
    document.getElementById('userName').textContent = user;
  }
});
