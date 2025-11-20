let perguntas = [];
let indice = 0;
let respostas = [];

// carregar perguntas
fetch(`${BASE_URL}/controllers/get_perguntas.php`)
  .then(res => res.json())
  .then(data => {
    perguntas = data;
    mostrarPergunta();
  });

function mostrarPergunta() {
  const p = perguntas[indice];
  const div = document.getElementById("container");

  div.innerHTML = `
    <h2 class="titulo">${p.texto}</h2>
    <div class="escala">
      ${Array.from({length: p.escala + 1}).map((_, i) =>
        `<button class="btn-nota" onclick="selecionar(${p.id}, ${i}, this)">${i}</button>`
      ).join('')}
    </div>
    <button class="btn-proximo" onclick="proximaPergunta()">
      ${indice === perguntas.length - 1 ? "Continuar" : "Próximo"}
    </button>
  `;
}

function selecionar(pid, nota, botao) {
  respostas[pid] = nota;
  botao.parentNode.querySelectorAll("button").forEach(b => b.classList.remove("sel"));
  botao.classList.add("sel");
}

function proximaPergunta() {
  const perguntaAtual = perguntas[indice];
  const notaRespondida = respostas[perguntaAtual.id];

  if (notaRespondida === undefined || notaRespondida === null) {
    alert("Por favor, selecione uma nota antes de continuar.");
    return;
  }

  if (indice < perguntas.length - 1) {
    indice++;
    mostrarPergunta();
  } else {
    telaFeedback();
  }
}


function telaFeedback() {
  const div = document.getElementById("container");
  div.innerHTML = `
    <h2 class="titulo">Deseja deixar algum comentário?</h2>
    <textarea id="feedback" placeholder="Feedback (opcional)"></textarea>
    <button class="btn-proximo" onclick="enviar()">Enviar Avaliação</button>
  `;
}

function enviar() {
  fetch(`${BASE_URL}/controllers/save_respostas.php`, {
    method: "POST",
    headers: {"Content-Type": "application/json"},
    body: JSON.stringify({
      respostas,
      feedback: document.getElementById("feedback").value,
      setor_id,
      dispositivo_id
    })
  }).then(() => {
    window.location.href = `${BASE_URL}/public/obrigado.php?device=${dispositivo_id}&setor=${setor_id}`;
  });
}


