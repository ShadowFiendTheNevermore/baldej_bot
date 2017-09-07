<?php

declare(strict_types=1);

namespace Bot\Providers;

use Bot\Intents\EshkereIntent;
use Bot\Intents\ExampleIntent;
use Bot\Intents\FallbackIntent;
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
            ExampleIntent::class,
            EshkereIntent::class
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
