<?php
header('Content-Type: application/json');

// Configuração de links e IPs de monitoramento
$links = [
    "Link A" => ["200.160.6.4", "8.8.8.8"],
    "Link B" => ["1.1.1.1", "172.217.28.206"]
];

// Número de pings por IP
$PING_COUNT = 3;

// Função para medir latência real via ping (Linux)
function medirLatencia($ip, $pings = 3) {
    $saida = [];
    $status = 0;

    // Executa ping
    exec("ping -c $pings $ip", $saida, $status);

    if ($status !== 0) {
        // IP inacessível
        return PHP_INT_MAX;
    }

    // Analisa saída do ping
    foreach ($saida as $linha) {
        if (preg_match('/rtt min\/avg\/max\/mdev = ([0-9\.]+)\/([0-9\.]+)\/([0-9\.]+)\/([0-9\.]+) ms/', $linha, $matches)) {
            return floatval($matches[2]); // Retorna latência média
        }
    }

    return PHP_INT_MAX;
}

// Avalia os IPs de cada link
function avaliarLink($nome, $ips, $pings) {
    $melhorIP = null;
    $melhorLatencia = PHP_INT_MAX;
    
    foreach ($ips as $ip) {
        $latencia = medirLatencia($ip, $pings);
        if ($latencia < $melhorLatencia) {
            $melhorLatencia = $latencia;
            $melhorIP = $ip;
        }
    }

    return [
        "nome" => $nome,
        "melhor_ip" => $melhorIP,
        "latencia" => $melhorLatencia
    ];
}

// Avaliar todos os links
$resultados = [];
foreach ($links as $nome => $ips) {
    $resultados[] = avaliarLink($nome, $ips, $PING_COUNT);
}

// Ordenar por melhor latência
usort($resultados, function($a, $b) {
    return $a['latencia'] - $b['latencia'];
});

// Definir link ativo
$linkAtivo = $resultados[0];

// Log simples
$log = date("Y-m-d H:i:s") . " - Link Ativo: {$linkAtivo['nome']} ({$linkAtivo['melhor_ip']}) Latência: {$linkAtivo['latencia']} ms" . PHP_EOL;
file_put_contents("latencia.log", $log, FILE_APPEND);

// Retornar JSON
echo json_encode([
    "links" => $resultados,
    "ativo" => $linkAtivo
], JSON_PRETTY_PRINT);
