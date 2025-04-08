<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('datadog.enabled', false);
        $this->migrator->add('datadog.application_id', '');
        $this->migrator->add('datadog.client_token', '');
        $this->migrator->add('datadog.session_sample_rate', 100);
        $this->migrator->add('datadog.session_replay_sample_rate', 20);
        $this->migrator->add('datadog.default_privacy_level', 'mask-user-input');
    }

    public function down()
    {
        $this->migrator->delete('datadog.enabled');
        $this->migrator->delete('datadog.application_id');
        $this->migrator->delete('datadog.client_token');
        $this->migrator->delete('datadog.session_sample_rate');
        $this->migrator->delete('datadog.session_replay_sample_rate');
        $this->migrator->delete('datadog.default_privacy_level');
    }
};
