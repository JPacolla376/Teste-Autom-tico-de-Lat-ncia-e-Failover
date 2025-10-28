# Teste Automático de Latência e Failover (PHP)

Projeto demonstrativo que implementa:

- **Backend (PHP)** para testar automaticamente a qualidade de links (latência, perda de pacotes e taxa de download) usando **2 IPs de monitoramento por link**.  
- **Frontend simulado (HTML/CSS/JS)** para apresentar visualmente a troca de links (failover) em formato de **dashboard cyber-style**.  
- **Demonstração animada (GIF)** do failover automático.

---

## Arquitetura

- `/backend/monitor.php` — script PHP que mede métricas, escolhe o melhor IP/link e gera logs.  
- `/backend/config.json` — lista de links, IPs de monitoramento e thresholds.  
- `/frontend/index.html` — dashboard fictício que simula visualmente a troca de links.  

---

## Objetivo

Demonstrar um **teste automático de qualidade de links** e como decisões automáticas de failover podem ser tomadas com base em métricas de latência, perda de pacotes e throughput.  

O frontend é **fictício**, apenas para fins de apresentação, enquanto o backend PHP realiza testes automatizados reais.

---

## Métricas avaliadas

1. **Latência (ms)** — tempo médio de resposta do IP monitorado.  
2. **Perda de pacotes (%)** — pacotes enviados vs pacotes recebidos.  
3. **Download estimado (Mbps)** — velocidade prática do link.  
4. **Disponibilidade / Status** — indica se o link está OK ou degradado.  
5. **Tempo de detecção e failover** — quando o link primário está degradado, o sistema alterna automaticamente para o link secundário.

---

## Por que usar 2 IPs por link

- **Rotas diferentes na internet:** cada IP pode ter caminhos distintos via BGP.  
- **Evitar falsos positivos:** se um IP está lento por congestionamento, o outro pode indicar que o link está OK.  
- **Redundância e confiabilidade:** o sistema escolhe o IP com melhor desempenho como referência para decisões de failover.

---

## Atuação de troca de link

https://youtu.be/ej3fDtMN-uA
