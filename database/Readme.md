# Loja de Câmeras e Cartões de Memória - Laravel

## Modelagem
O banco de dados foi modelado para representar um cenário onde câmeras e cartões de memória possuem relação **muitos-para-muitos**.

### Estrutura:
- **cameras**: Armazena informações de marca, modelo, resolução e preço.
- **memory_cards**: Armazena dados como marca, tipo (SD/MicroSD), capacidade em GB e preço.
- **camera_memory_card**: Tabela pivot que representa quais cartões podem ser usados em quais câmeras.

### Justificativa
A modelagem permite que:
- Uma câmera seja compatível com vários cartões.
- Um cartão seja compatível com várias câmeras.
- O sistema seja flexível para futuras expansões (novos tipos de produtos, filtros, etc.).
