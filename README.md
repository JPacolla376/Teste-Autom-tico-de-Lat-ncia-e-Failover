# Teste Automático de Latência e Failover (PHP)

Projeto demonstrativo que implementa:
- Backend (PHP) para testar automaticamente a qualidade de links (latência, perda, download) usando 2 IPs de monitoramento por link.
- Frontend fictício (HTML/CSS/JS) para apresentar visualmente a troca de links (failover) em formato de dashboard.

## Arquitetura
- `/backend/monitor.php` — script PHP que mede e escolhe o melhor IP/link.
- `/frontend/index.html` — dashboard fictício que ilustra a troca.
- `/media/demo.gif` — demonstração animada para apresentação.

## Como executar (desenvolvimento)
1. Backend:
   <?php
header('Content-Type: application/json');

// Configuração de links e IPs de monitoramento
$links = [
    "Link A" => ["200.160.6.4", "8.8.8.8"],
    "Link B" => ["1.1.1.1", "172.217.28.206"]
];

// Função para medir latência de um IP (simulação)
function medirLatencia($ip) {
    // Para teste real, poderia usar exec("ping -c 1 $ip") e processar saída
    return rand(10, 150); // latência simulada
}

// Função que avalia os IPs de cada link
function avaliarLink($nome, $ips) {
    $melhorIP = null;
    $melhorLatencia = PHP_INT_MAX;
    
    foreach ($ips as $ip) {
        $latencia = medirLatencia($ip);
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
    $resultados[] = avaliarLink($nome, $ips);
}

// Ordenar por melhor latência
usort($resultados, function($a, $b) {
    return $a['latencia'] - $b['latencia'];
});

// Link ativo é o de menor latência
$linkAtivo = $resultados[0];

// Log simples
$log = date("Y-m-d H:i:s") . " - Link Ativo: {$linkAtivo['nome']} ({$linkAtivo['melhor_ip']})" . PHP_EOL;
file_put_contents("latencia.log", $log, FILE_APPEND);

// Retornar JSON para visualização
echo json_encode([
    "links" => $resultados,
    "ativo" => $linkAtivo
], JSON_PRETTY_PRINT);
