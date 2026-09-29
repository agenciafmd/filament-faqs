# Filament – FAQs

[![Downloads](https://img.shields.io/packagist/dt/agenciafmd/filament-faqs.svg?style=flat-square)](https://packagist.org/packages/agenciafmd/filament-faqs)
[![Licença](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

Pacote de perguntas frequentes (FAQs) para o painel administrativo (Admix). Entrega o CRUD completo de FAQs (pergunta, slug, resposta, status e ordenação), com filtros, lixeira e auditoria.

## Requisitos

- PHP ^8.4
- Laravel ^12.0 | ^13.0
- Filament ^5.0
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

3. Populando o banco com dados de testes

Adicione o seeder no `database/seeders/DatabaseSeeder.php`:

```php
use Agenciafmd\Faqs\Database\Seeders\FaqSeeder;

$this->call([
    FaqSeeder::class,
]);
```

Ou rode o seeder manualmente:

```bash
php artisan db:seed --class="Agenciafmd\Faqs\Database\Seeders\FaqSeeder"
```

## Ativando no painel

O pacote inclui o plugin `FaqsPlugin`, que registra o `FaqResource`. Adicione-o na config do Admix `config/filament-admix.php`:

```php
use Agenciafmd\Faqs\FaqsPlugin;

return [
    'plugins' => [
        FaqsPlugin::class,
    ],
];
```

Após isso, o menu **Perguntas frequentes** aparecerá no painel, com as páginas de Listar, Criar e Editar.

## Configuração

Arquivo: `config/filament-faqs.php`

```php
return [
    'name' => 'FAQs',
    'navigation_group' => null,
    'navigation_sort' => 11,
];
```

| Chave | Padrão | Descrição |
|---|---|---|
| `name` | `FAQs` | Nome do pacote. |
| `navigation_group` | `null` | Grupo do menu em que o Resource aparece. |
| `navigation_sort` | `11` | Posição do item no menu. |

O pacote não publica o arquivo de config. Para sobrescrever, crie `config/filament-faqs.php` no projeto; ele é mesclado com o do pacote.

FAQs excluídas há mais de 30 dias são removidas definitivamente pelo `model:prune`, agendado diariamente às 03h (os minutos vêm de `filament-admix.schedule.minutes`).

## Permissões

O `FaqResource` entra automaticamente no controle de acesso por Grupos do Admix, com as permissões de visualizar, criar, editar, excluir, restaurar e auditoria. Usuário sem grupo é administrador e tem acesso total. Não há permissões extras.

## Auditoria

O `FaqResource` inclui o relation manager `Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager`, exibindo o histórico de auditorias do registro (o `tapp/filament-auditing` é instalado pelo `filament-admix`).

## Licença

Este pacote é software livre e está disponível nos termos da licença MIT.
