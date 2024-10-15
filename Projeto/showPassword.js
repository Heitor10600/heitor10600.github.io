    // Seleciona o campo de senha e o ícone de olho
    const togglePassword = document.querySelector('.olho');
    const password = document.querySelector('#senha');

    // Adiciona um evento de clique no ícone
    togglePassword.addEventListener('click', () => {
        // Verifica o tipo atual do campo de senha
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        // Altera o tipo para mostrar ou ocultar a senha
        password.setAttribute('type', type);

        // Altera o estado do ícone para indicar se a senha está visível ou oculta
        if (type === 'text') {
            togglePassword.innerHTML = `
                <lord-icon
					src="https://cdn.lordicon.com/dicvhxpz.json"
					trigger="hover"
					colors="primary:#e0f7e9,secondary:#e0f7e9"
					style="width:25px;height:25px">
					</lord-icon>
            `;
        } else {
            togglePassword.innerHTML = `
                <lord-icon
					src="https://cdn.lordicon.com/dicvhxpz.json"
					trigger="hover"
                    state="hover-cross"
					colors="primary:#e0f7e9,secondary:#e0f7e9"
					style="width:25px;height:25px">
					</lord-icon>
            `;
        }
    });







/*const togglePassword = document.querySelector('.olho');
const password = document.querySelector('#senha');

togglePassword.addEventListener('click', () => {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', 'type');
});
*/