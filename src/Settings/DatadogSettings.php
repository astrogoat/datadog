<?php

namespace Astrogoat\Datadog\Settings;

use Helix\Lego\Settings\AppSettings;
use Illuminate\Validation\Rule;

class DatadogSettings extends AppSettings
{
    public string $application_id;
    public string $client_token;
    public string $session_sample_rate;
    public string $session_replay_sample_rate;
    public string $default_privacy_level;

    public function rules(): array
    {
        return [
            'application_id' => Rule::requiredIf($this->enabled === true),
            'client_token' => Rule::requiredIf($this->enabled === true),
            'session_sample_rate' => Rule::requiredIf($this->enabled === true),
            'session_replay_sample_rate' => Rule::requiredIf($this->enabled === true),
            'default_privacy_level' => Rule::requiredIf($this->enabled === true),
        ];
    }

    public static function encrypted(): array
    {
        return ['client_token'];
    }

    public function description(): string
    {
        return 'Interact with Datadog.';
    }

    public static function group(): string
    {
        return 'datadog';
    }

    public function defaultPrivacyLevelOptions()
    {
        return [
            'allow' => 'All text available by default',
            'mask-user-input' => 'All user input masked by default',
            'mask' => 'All text masked by default',
        ];
    }

    public function help(): array
    {
        return [
            'session_sample_rate' => 'Set the % of total user sessions you want to capture for this application.',
            'session_replay_sample_rate' => 'Set the % of captured user sessions that should include Session Replay recordings',
        ];
    }
}
