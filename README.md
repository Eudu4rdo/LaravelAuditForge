# LaravelAuditForge

Este é um pacote Laravel destinado à auditoria de atividades dentro de sua aplicação. O objetivo final da aplicação é registrar as atividades dos usuários em sua aplicação, seja alterações em modelos, rotas acessadas e histórico de login/logout. O grande diferencial deste pacote é o possivel uso de filas para poder realizar o registro do rastreio.

## Installation
### Requirements

- PHP ^8.0
- Laravel ^10

### Installation Steps

1. **Install the package via Composer:**
```bash
composer require eudu4rdo/laravelauditforge
````
2. **Publish the configuration files (optional):**
```bash
php artisan vendor:publish --provider="eudu4rdo\LaravelAuditForge\AuditForgeServiceProvider"
````
Este pacote possui alguns arquivos publicaveis. Nesta primera versão apenas dois: o arquivo de configuração (audit-forge.php) e a migração usada para gerar a estrutura de tabelas na base.

3. **Set up models for auditing:**
````bash
    use eudu4rdo\laravelauditforge\Traits\Auditable;

    class Market extends Model
    {
        use Auditable;
    }
````
Para garantir que o modelo será 

## Features
### Audit Logging
Quando importado dentro de um model o pacote registrará as ações de criação, atualização e exclusão do modelo.
Cada evento gerado é registrado no banco de dados, com informações sobre o usuário, os dados antes e depois da alteração e a data/hora do evento.