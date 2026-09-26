<?php

declare(strict_types=1);

namespace Agenciafmd\Faqs\Tests\Feature\Models;

use Agenciafmd\Faqs\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('renders an empty paragraph when the faq has no description', function (): void {
    $faq = Faq::factory()->make(['description' => null]);

    expect($faq->front_description->toHtml())->toBe('<p></p>');
});
