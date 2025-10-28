# Teste Automático de Latência e Failover (PHP)

Projeto demonstrativo que implementa:

- **Backend (PHP)** para testar automaticamente a qualidade de links (latência, perda de pacotes e taxa de download) usando **2 IPs de monitoramento por link**.  
- **Frontend fictício (HTML/CSS/JS)** para apresentar visualmente a troca de links (failover) em formato de **dashboard cyber-style**.  
- **Demonstração animada (GIF)** do failover automático.

---

## Arquitetura

- `/backend/monitor.php` — script PHP que mede métricas, escolhe o melhor IP/link e gera logs.  
- `/backend/config.json` — lista de links, IPs de monitoramento e thresholds.  
- `/frontend/index.html` — dashboard fictício que simula visualmente a troca de links.  
- `/media/demo.gif` — demonstração animada do frontend para apresentação.

---

## Objetivo

Demonstrar um **teste automático de qualidade de links** e como decisões automáticas de failover podem ser tomadas com base em métricas de latência, perda de pacotes e throughput.  

O fronten
