<?php

declare(strict_types=1);

namespace Bot\Providers;

use Bot\Intents\CreateCategoryIntent;
use Bot\Intents\CreateProductIntent;
use Bot\Intents\ExampleIntent;
use Bot\Intents\FallbackIntent;
use Bot\Intents\SetupDbIntent;
use Bot\Intents\ShowCategoriesIntent;
use FondBot\Conversation\IntentServiceProvider as BaseIntentServiceProvider;

class IntentServiceProvider extends BaseIntentServiceProvider
{
    /**
     * Define intents.
     *
     * @return string[]
     */
    public function intents(): array
    {
        return [
            ShowCategoriesIntent::class,
            CreateCategoryIntent::class,
            CreateProductIntent::class,
        ];
    }

    /**
     * Define fallback intent.
     *
     * @return string
     */
    public function fallbackIntent(): string
    {
        return FallbackIntent::class;
    }
}
