# Adianti Template 8.2

## Visão Geral

Este projeto é baseado no Adianti Framework, uma plataforma PHP para desenvolvimento rápido de aplicações web, com foco em produtividade, segurança e flexibilidade. O template oferece uma estrutura modular, pronta para autenticação, permissões, logs, notificações, REST, SOAP, e muito mais.

## Estrutura de Pastas

- **app/config/**: Arquivos de configuração da aplicação, bancos, permissões, etc.
- **app/control/**: Controladores das páginas e componentes da interface.
- **app/database/**: Scripts SQL e bancos SQLite para comunicação, log e permissões.
- **app/images/**: Imagens utilizadas na aplicação.
- **app/lib/**: Bibliotecas auxiliares, utilitários, widgets, validadores, etc.
- **app/model/**: Modelos de dados (ORM), como usuários, grupos, permissões, unidades, etc.
- **app/output/**: Saída de arquivos gerados pela aplicação.
- **app/reports/**: Relatórios customizados.
- **app/resources/**: Arquivos HTML, CSS e recursos visuais.
- **app/service/**: Serviços REST, CLI, autenticação, jobs, etc.
- **app/templates/**: Templates visuais (ex: adminbs5).
- **app/view/**: Views customizadas.

## Principais Funcionalidades

- **Autenticação e Permissões**: Controle de acesso por usuários, grupos, papéis e unidades.
- **Notificações e Mensagens**: Sistema interno para comunicação entre usuários.
- **Logs**: Registro de operações, alterações e comandos SQL.
- **REST e SOAP**: Serviços prontos para integração externa.
- **Interface Modular**: Separação clara entre controle, modelo e visualização.
- **Multi-idioma**: Suporte a português, inglês e espanhol.
- **Temas**: Personalização visual via templates.

## Configuração

- Os arquivos de configuração estão em `app/config/`. Exemplos:
	- `application.php`: Configurações gerais (idioma, tema, título, etc).
	- `permission.php`, `communication.php`, `log.php`: Configuração dos bancos SQLite.
- O banco padrão é SQLite, mas pode ser adaptado para outros via configuração.

## Modelos de Dados

- **Usuários**: `SystemUser` (app/model/admin/SystemUser.php)
- **Grupos**: `SystemGroup`
- **Papéis**: `SystemRole`
- **Unidades**: `SystemUnit`
- **Programas**: `SystemProgram`
- **Permissões**: `SystemPermission`
- **Preferências**: `SystemPreference`

## Dependências

As principais dependências estão no `composer.json`:
- phpmailer/phpmailer
- dompdf/dompdf
- firebase/php-jwt
- bacon/bacon-qr-code
- adianti/plugins, adianti/pdfdesigner, etc.

Instale com:
```sh
composer install
```

## Como Executar

1. Configure o ambiente PHP (>=7.4) e um servidor web (ex: Apache, Laragon).
2. Ajuste as configurações em `app/config/application.php` conforme necessário.
3. Acesse `index.php` pelo navegador.
4. O login padrão pode ser configurado no banco `app/database/permission.db`.

## Segurança

- Permissões são controladas por classes e métodos públicos definidos em `application.php`.
- Autenticação via login/senha, com opção de renovação de senha e validação forte.

## Personalização

- Modifique templates em `app/templates/adminbs5/`.
- Adicione novos controladores em `app/control/`.
- Crie novos modelos em `app/model/`.

## Recursos Adicionais

- **REST**: Endpoints em `rest/`.
- **SOAP**: Endpoints em `soap.php.dist`.
- **CLI**: Scripts em `service/cli/`.

## Licença

Adianti Framework é distribuído sob licença própria. Veja o arquivo LICENSE.