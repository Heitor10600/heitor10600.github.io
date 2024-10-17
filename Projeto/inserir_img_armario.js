document.addEventListener("DOMContentLoaded", function () {
    // Função para carregar imagens dinamicamente
    function carregarImagens(categoria, idResumo, idDivPeca) {
        // Simulação de um request para buscar imagens do servidor
        fetch(`get_imagens.php?categoria=${categoria}`)
            .then(response => response.json())
            .then(data => {
                // Atualiza a imagem de resumo
                if (data.imagemResumo) {
                    document.getElementById(idResumo).src = data.imagemResumo;
                }

                // Atualiza as imagens dentro da categoria
                const divPeca = document.getElementById(idDivPeca);
                data.imagens.forEach(imagem => {
                    const li = document.createElement("li");
                    const img = document.createElement("img");
                    img.classList.add("peca_style");
                    img.src = imagem;
                    li.appendChild(img);
                    divPeca.appendChild(li);
                });
            })
            .catch(error => console.error("Erro ao carregar imagens:", error));
    }

    // Chamando a função para cada categoria
    carregarImagens("chapeus", "summary-chapeus", "peca-chapeus");
    // Repetir para outras categorias (jóias, óculos, etc.)
});
