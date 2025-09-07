const tabela = document.getElementById('tabelaNotas');//pega tabela de notas
const btnLinha = document.getElementById('linhaTotal');//pega o botao que cria a linha
const btnColuna = document.getElementById('colunaTotal');//pega o botao que cria a coluna

// Linha totalizadora (média por nota)
btnLinha.addEventListener('click', function() {
    const linhas = tabela.rows;
    const colunas = linhas[2].cells.length;
    const novaLinha = tabela.insertRow();

    // primeira célula da linha totalizadora
    const celulaAluno = novaLinha.insertCell();
    celulaAluno.innerText = "Média";
    celulaAluno.classList.add('media-linha');

    // calcula a média de cada coluna
    for (let j = 1; j < colunas; j++) {
        let soma = 0;
        let qtd = 0;
        for (let i = 2; i < linhas.length - 1; i++) { // ignora cabeçalho e linha totalizadora já adicionada
            const valor = parseFloat(linhas[i].cells[j].innerText);
            if (!isNaN(valor)) { soma += valor; qtd++; }
        }
        const celula = novaLinha.insertCell();
        celula.innerText = (soma / qtd).toFixed(2);
        celula.classList.add('media-linha');
    }

    btnLinha.disabled = true;
});

// Coluna totalizadora (média por aluno) com <th rowspan="2">Média</th>
btnColuna.addEventListener('click', function() {
    const linhas = tabela.rows;

    // Adicionar th na primeira linha do cabeçalho com rowspan=2
    const thMedia = document.createElement('th');
    thMedia.setAttribute('rowspan', '2');
    thMedia.innerText = "Média";
    linhas[0].appendChild(thMedia);

    // Adicionar células médias nas linhas de aluno
    for (let i = 2; i < linhas.length; i++) {
        let soma = 0;
        let qtd = 0;
        for (let j = 1; j < linhas[i].cells.length; j++) {
            const valor = parseFloat(linhas[i].cells[j].innerText);
            if (!isNaN(valor)) { soma += valor; qtd++; }
        }
        const celula = linhas[i].insertCell();
        celula.innerText = (soma / qtd).toFixed(2);
        celula.classList.add('media-coluna');
    }

    btnColuna.disabled = true;
});
