<?php

namespace App\Utilities;

/**
 * Provides a Blade directive for session tokens.
 */
class SessionToken
{
    /**
     * Output for the directive.
     *
     * @return string
     */
    public function __invoke(): string
    {
        return <<<"HTML"
        <input type="hidden" class="session-token" name="token" value="" />
        <input type="hidden" class="host" name="{{ request()->get('host') }}" value="" />
        <input type="hidden" class="shop" name="{{ request()->get('shop') }}" value="" />
        HTML;
    }
}

