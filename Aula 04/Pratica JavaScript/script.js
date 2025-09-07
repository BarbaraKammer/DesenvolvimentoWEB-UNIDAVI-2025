document.getElementById('login').addEventListener('click', function() {
    const usuario = document.getElementById('campo_usuario');
    const senha = document.getElementById('campo_senha');

    // Limpar classe de erro
    usuario.classList.remove('user_pass_fail');
    senha.classList.remove('user_pass_fail');

    // Verificar login
    if (usuario.value === 'user' && senha.value === 'pass') {
        alert('Login Ok');
    } else {
        alert('Usuário ou senha incorretos!');
        // Aplicar estilo de erro
        usuario.classList.add('user_pass_fail');
        senha.classList.add('user_pass_fail');
    }
});
