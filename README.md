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
   ```bash
   php backend/monitor.php
