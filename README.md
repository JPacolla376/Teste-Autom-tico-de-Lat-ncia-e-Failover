
---

## 11 — Roteiro de slides (Canva) — estrutura curta (5–8 minutos)
Use **~8 slides**. Em cada slide coloque uma linha de fala curta (notas abaixo).

1. **Título** — “Teste Automático de Latência e Failover”  
   - Fala: objetivo direto do trabalho.

2. **Problema / Motivação** — impacto de links degradados em apps/SLAs.  
   - Fala: exemplificar com usuário final (aplicação lenta).

3. **Solução proposta (alto nível)** — arquitetura: monitor → decisão → failover.  
   - Fala: ciclo automatizado como teste contínuo.

4. **Métricas e metodologia** — latência, perda, download, thresholds.  
   - Fala: como medimos e por que.

5. **Porque 2 IPs por link** — diagrama simples mostrando rotas distintas.  
   - Fala: evitar falsos positivos, cobrir rotas diferentes.

6. **Demonstração visual (GIF)** — insira `media/demo.gif` do frontend.  
   - Fala: explique o que o público está vendo (troca, cores, histórico).

7. **Resultados esperados / logs** — mostre um trecho de log e interpretação.  
   - Fala: exemplo de evento e o que foi acionado.

8. **Conclusão e próximos passos** — alerting, integração com Grafana/Prometheus, ajustes de thresholds.  
   - Fala: lições aprendidas e como expandir.

**Dicas para o Canva:**
- Use um template limpo com fundo escuro.  
- Paleta: `#121212` (bg), `#FFFFFF` (texto), `#4CAF50` (ativo), `#BDBDBD` (inativo), `#FF9800` (highlights).  
- Tipografia: título forte (Montserrat/Oswald), corpo legível (Roboto/Arial).  
- Use um slide com o GIF central (exportar como MP4/GIF).  
- Limite texto por slide (3–4 bullets).  
- Inclua um slide com *call to action* e link para o repositório GitHub.

---

## 12 — Notas do orador (para cada slide — resumo)
- **Slide 1:** 10–15s — Apresente objetivo.
- **Slide 2:** 30s — Problema real (latência/perda afeta apps).
- **Slide 3:** 40s — Explique o ciclo automatizado (testar → decidir → agir).
- **Slide 4:** 30s — Métricas e thresholds (exemplos práticos).
- **Slide 5:** 30s — Por que dois IPs (evitar falso positivo).
- **Slide 6:** 60s — Mostre GIF, narre a cadeia: monitor → detecta → failover.
- **Slide 7:** 30s — Mostre logs/resultado.
- **Slide 8:** 20s — Conclusão / convite para ver o GitHub.

Tempo total estimado: ~4–5 minutos (enxuto e objetivo).

---

## 13 — Como gravar o GIF de demonstração (passos práticos)
1. Abra `frontend/index.html` localmente no browser.  
2. Use **Peek/Kazam/ScreenToGif** para gravar a área da tela com o dashboard.  
3. Configure duração ~6–10s, resolução pequena (ex.: 720×360) para reduzir tamanho.  
4. Salve como GIF. Otimize com `gifsicle` ou sites de compressão se necessário.  
5. Coloque em `/media/demo.gif` e faça referência no README + slide.

---

## 14 — Publicando no GitHub (passos rápidos)
```bash
git init
git add .
git commit -m "Initial commit - monitor PHP + dashboard simulado"
gh repo create my-failover-monitor --public   # ou use github.com criar
git push -u origin main
