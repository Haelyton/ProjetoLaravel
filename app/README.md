## Padrões de Projeto e Arquitetura (Entrega Parcial 1)

### Factory Method
- Implementado em `App\Services\Factory\CameraFactory` e exposto via `App\Contracts\CameraFactoryInterface`.
- Justificativa: centraliza a lógica de criação de objetos `Camera`, evitando `new` espalhado nos controllers e facilitando testes (mock do factory) e validações adicionais no momento da criação.

### Strategy
- Implementado como `CameraFilterStrategyInterface` com estratégias como `ByBrandStrategy` e `ByResolutionStrategy`, e o `CameraFilterContext` que aplica as estratégias.
- Justificativa: permite adicionar novos filtros de listagem sem alterar o código do handler/controller, atendendo ao Open/Closed Principle.

### CQRS (início)
- Separação inicial entre **Commands** (escrita) e **Queries** (leitura).
  - Ex.: `CreateCameraCommand` + `CreateCameraHandler` (comando)
  - Ex.: `GetCamerasQuery` + `GetCamerasHandler` (query)
- Justificativa: melhora separação de responsabilidades, facilita rastreabilidade de comandos (logs/filas) e torna as consultas escaláveis/otimizáveis separadamente.

### SOLID e Injeção de Dependência
- Controllers recebem dependências via construtor (handlers, context), seguindo DIP.
- Classes pequenas e com responsabilidades claras (SRP).
- Extensibilidade através de interfaces — fácil substituição e teste.

### Como usar (exemplos)
- `POST /api/cameras` → cria câmera (fluxo passa por `StoreCameraRequest` -> `CreateCameraCommand` -> `CreateCameraHandler`).
- `GET /api/cameras?marca=Canon` → lista câmeras com filtro de marca (fluxo passa por `GetCamerasQuery` -> `GetCamerasHandler` -> `CameraFilterContext` -> `ByBrandStrategy`).

