document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const container = document.querySelector(".container");
    const botao = document.querySelector("button[type='submit']");

    if (!form || !botao) {
        console.error("Formulário ou botão não encontrado!");
        return;
    }

    botao.addEventListener("click", (e) => {
        const checked = form.querySelector("input[name='resposta']:checked");
        const feedback = form.querySelector("textarea");

        if (!checked) {
            e.preventDefault();
            alert("Por favor, selecione uma nota antes de prosseguir!");
            return false;
        }

        if (feedback && feedback.value.trim().length > 500) {
            e.preventDefault();
            alert("O comentário é muito longo (máximo 500 caracteres).");
            
            return false;
        }
        // Efeito de transição suave ao enviar
        container.style.transition = "opacity 0.3s ease";
        container.style.opacity = "0";
    });
    
});
