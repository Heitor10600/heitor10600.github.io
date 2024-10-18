<?php
header('Content-Type: application/json');

$categoria = $_GET['categoria'];

// Simulando a resposta com base na categoria
$imagens = [
    "chapeus" => [
        "imagemResumo" => "peças/chap1.png",
        "imagens" => [
            "peças/chap1.png",
            "peças/chap2.png",
            "peças/chap3.jpg",
            "peças/chap4.png",
            "peças/chap5.png"
        ]
    ],
    // Adicionar outros arrays para outras categorias...
];

// Retorna a lista de imagens para a categoria solicitada
if (array_key_exists($categoria, $imagens)) {
    echo json_encode($imagens[$categoria]);
} else {
    echo json_encode([]);
}
?>
