<?php

namespace Astrogoat\Datadog\Settings;

use Helix\Lego\Settings\AppSettings;
use Illuminate\Validation\Rule;

class DatadogSettings extends AppSettings
{
    public string $application_id;
    public string $client_token;
    public string $site;
    public string $session_sample_rate;
    public string $session_replay_sample_rate;
    public string $default_privacy_level;
    public bool $track_user_interactions;
    public bool $track_resources;
    public bool $track_long_tasks;
    public bool $enable_privacy_for_action_name;

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

    public function description(): string
    {
        return 'Interact with Datadog.';
    }

    public static function group(): string
    {
        return 'datadog';
    }

    public function sections(): array
    {
        return [
            [
                'title' => 'RUM (Real User Monitoring)',
                'properties' => [
                    'application_id',
                    'client_token',
                    'site',
                    'session_sample_rate',
                    'session_replay_sample_rate',
                    'default_privacy_level',
                    'track_user_interactions',
                    'track_resources',
                    'track_long_tasks',
                    'enable_privacy_for_action_name',
                ],
            ],
        ];
    }

    public function siteOptions(): array
    {
        return [
            'datadoghq.com' => 'US1 (https://app.datadoghq.com) | US',
            'us3.datadoghq.com' => 'US3 (https://us3.datadoghq.com) | US',
            'us5.datadoghq.com' => 'US5 (https://us5.datadoghq.com) | US',
            'datadoghq.eu' => 'EU (https://app.datadoghq.eu) | Germany',
            'ddog-gov.com' => 'US1-FED (https://app.ddog-gov.com) | US',
            'ap1.datadoghq.com' => 'AP1 (https://ap1.datadoghq.com) | Japan',
        ];
    }

    public function defaultPrivacyLevelOptions(): array
    {
        return [
            'allow' => 'All text available by default',
            'mask-user-input' => 'All user input masked by default',
            'mask' => 'All text masked by default',
        ];
    }

    public function labels():array
    {
        return [
            'application_id' => 'Application ID',
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
