//Quando o usuário clicar no botão, será chamada a função correspondente
document.getElementById('soma').addEventListener('click', soma);
document.getElementById('subtracao').addEventListener('click', subtracao);
document.getElementById('multiplicacao').addEventListener('click', multiplicacao);
document.getElementById('divisao').addEventListener('click', divisao);

//Pega os valores digitados em n1 e n2 e retorna um array para ser usado nas funções
function obterNumeros() {
    const n1 = parseFloat(document.getElementById('primeiro_numero').value);
    const n2 = parseFloat(document.getElementById('segundo_numero').value);

    if (isNaN(n1) || isNaN(n2)) {
        throw new Error('Digite números válidos!');
    }

    return [n1, n2];
}

//Funcao que exibe o valor do resultado juntamente com a cor correspondente
function exibirResultado(valor) {
    const resultadoCampo = document.getElementById('resultado');
    resultadoCampo.value = valor;//mostra o valor do resultado da conta

    // Remove todas as classes antes de adicionar a nova
    resultadoCampo.classList.remove('positivo', 'negativo', 'neutro');

    // Adiciona a classe correta
    if (valor > 0) {
        resultadoCampo.classList.add('positivo'); 
    } else if (valor < 0) {
        resultadoCampo.classList.add('negativo'); 
    } else {
        resultadoCampo.classList.add('neutro'); 
    }
}

// Funções das operações
function soma() {
    try {
        const [n1, n2] = obterNumeros(); //chama a função para pegar os números digitados
        exibirResultado(n1 + n2); //calcula a soma e chama a funcao para mostrar o valor resultado 
    } catch (erro) {
        alert(erro.message);
    }
}

function subtracao() {
    try {
        const [n1, n2] = obterNumeros();
        exibirResultado(n1 - n2);
    } catch (erro) {
        alert(erro.message);
    }
}

function multiplicacao() {
    try {
        const [n1, n2] = obterNumeros();
        exibirResultado(n1 * n2);
    } catch (erro) {
        alert(erro.message);
    }
}

function divisao() {
    try {
        const [n1, n2] = obterNumeros();
        if (n2 === 0) throw new Error('Divisão por zero não é permitida!');
        exibirResultado(n1 / n2);
    } catch (erro) {
        alert(erro.message);
    }
}


