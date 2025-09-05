# � Adianti FW 8.2 — Visão geral e mapeamento da documentação

Adianti é um framework PHP orientado a componentes para construir aplicações web rapidamente: páginas (TPage), formulários (TForm), componentes de entrada, models com TRecord, grids, critérios de busca, renderizadores de template e ferramentas para criar APIs. Esta documentação organiza conceitos, guias e exemplos em pastas para facilitar a navegação e a contribuição.

## � Mapeamento da documentação para pastas
Aqui está o mapeamento dos tópicos principais para as pastas do repositório. Use os links para navegar diretamente aos tópicos.

- `01-formularios/` — Formulários e componentes de entrada
    - Exemplos e componentes: `tentry.md`, `tcombo.md`, `tdate.md`, `tdatetime.md`, `tform.md`, `tfile.md`, `tpassword.md`, `tselect.md`, `tnotebook.md`, `ttext.md`, etc.
    - Validadores: pasta `01-formularios/validators/` (ex.: `temailvalidator.md`, `tcpfvalidator.md`, `tcnpjvalidator.md`)
    - Guias de wrapper e casos de uso: `BootstrapFormWrapper.md`, `BootstrapFormBuilder.md`, `tmodalform.md`

- `02-datagrids/` — DataGrids, colunas, ações e exportação
    - Conceitos e classes base: `TDataGrid.md`, `BootstrapDatagridWrapper.md`, `TQuickGrid.md`
    - Colunas, transformações e ações: `TDataGridColumn.md`, `TransformacoesDeColuna.md`, `TDataGridAction.md`, `TDataGridActionGroup.md`
    - Busca, filtros e paginação: `CriteriosDeBusca.md`, `FiltrosDeColuna.md`, `PaginacaoEPerformance.md`
    - Exportação: `ExportacaoDeDados.md`

- `03-models/` — Models, TRecord e operação com banco
    - TRecord e mapeamento: `TRecord.md`, `TDatabase.md`, `TConnection.md` (guia e exemplos em `Operacoes-CRUD.md` e `Relacionamentos.md`)

- `04-criterias-filters/` (e `04-criterias-filters/` alternativas) — Filtros e consultas
    - `TCriteria.md`, `TFilter.md`, `OrdenacaoAgrupamento.md`, exemplos avançados em `Exemplos-Avancados.md`

- `05-apis/` — APIs REST e integração
    - `Documentacao-API.md`, `Integracao-Frontend.md`, `REST.md`, `Servicos-Internos.md`

- `06-thtmlrenderer/` — THtmlRenderer e templates
    - Carregamento de templates, seções condicionais e integração: `Carregamento-Templates.md`, `Secoes-e-Conditicoes.md`

- `07-componentes/` — Componentes customizados e distribuição
    - Guias para componentes de formulário e grid, exemplos de reutilização em `Componentes-Formulario.md` e `Componentes-Grid.md`

- `08-traits/` — Traits úteis do framework
    - Traits para integração com banco, arquivos e formulários: `AdiantiDatabaseWidgetTrait.md`, `AdiantiMasterDetailTrait.md`, `AdiantiFileSaveTrait.md` e outros.

## 🔎 Como navegar nesta documentação
- Abra `01-formularios/`, `02-datagrids/`, `03-models/` etc. para ver guias e exemplos por área.
- Procure na pasta `01-formularios/validators/` para ver validadores prontos e exemplos em `examples/`.
- Use os arquivos `README.md` ou `appendPage.md` dentro das pastas quando existir para orientações locais.

## �️ Como contribuir
- Edite o arquivo relevante na pasta correspondente e abra um pull request com a mudança proposta.
- Preferência por exemplos funcionais e pequenos snippets testáveis.

## ✅ Checklist rápido (navegação)
- Formulários: veja `01-formularios/` — Done
- DataGrids: veja `02-datagrids/` — Done
- Models/TRecord: veja `03-models/` — Done
- Criterias/Filters: veja `04-criterias-filters/` — Done
- APIs: veja `05-apis/` — Done

---

*Framework Adianti 8.2 - Documentação mapeada e organizada*  
*Última atualização: 5 de setembro de 2025*
