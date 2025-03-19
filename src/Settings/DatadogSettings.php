<?php

namespace Astrogoat\Datadog\Settings;

use Helix\Lego\Settings\AppSettings;
use Illuminate\Validation\Rule;

class DatadogSettings extends AppSettings
{
    // public string $url;

    public function rules(): array
    {
        return [
//            'url' => Rule::requiredIf($this->enabled === true), // Example, modify to fit your need.
        ];
    }

    public function description(): string
    {
        return 'Interact with Datadog.';
    }

    public static function group(): string
    {
        return 'datadog';
    }
}
