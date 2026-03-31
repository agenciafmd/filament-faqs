# Agenciafmd – Filament FAQs

Pacote de perguntas frequentes (FAQs) para o painel administrativo (Admix), baseado em Filament v4 e Laravel 12. Ele fornece o CRUD completo de FAQs, incluindo auditoria, filtros e ordenação personalizada.

## Requisitos

- PHP ^8.4
- Laravel ^12.0
- Filament ^4.0
- agenciafmd/filament-admix v1.x-dev | dev-master

## Instalação

1. Instale o pacote via Composer:

```bash
composer require agenciafmd/filament-faqs
```

2. Execute as migrações:

```bash
php artisan migrate
```

3. (Opcional) Popule o banco:

```bash
php artisan db:seed --class=Agenciafmd\\Faqs\\Database\\Seeders\\FaqSeeder
```

## Ativando no painel Filament

Este pacote inclui um Plugin Filament que registra o `FaqResource` automaticamente. Adicione o plugin na config do admix `config/filament-admix.php`:

```php
use Agenciafmd\Faqs\FaqsPlugin;

return [
    'plugins' => [
        FaqsPlugin::class,
    ],
];
```

Após isso, o menu "Perguntas frequentes" aparecerá no painel, com as páginas de Listar, Criar e Editar.

## Recursos incluídos

- Model: `Agenciafmd\Faqs\Models\Faq` (Soft Deletes, HasFactory, Auditing e limpeza programada via `prunable()`)
- Migração: cria a tabela `faqs` com campos principais (`name`, `slug` único, `description`, `is_active`, `sort`, timestamps e soft deletes)
- Factory e Seeder: `FaqFactory` e `FaqSeeder`
- Resource Filament: `FaqResource` com páginas `ListFaqs`, `CreateFaq`, `EditFaq`
- Formulário: `FaqForm` com seções "General" e "Information"
- Tabela: `FaqsTable` com colunas, filtros e ordenação padrão por `sort`
- Serviço: `FaqService`
- Traduções pt_BR prontas

## Configuração

Arquivo: `config/filament-faqs.php`

```php
return [
    'name' => 'FAQs',
];
```

## Auditoria

O `FaqResource` inclui o relation manager `Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager`, exibindo o histórico de auditorias quando o pacote `tapp/filament-auditing` for utilizado pelo projeto via `filament-admix`.

## Licença

Este pacote é software livre e está disponível nos termos da licença MIT.
