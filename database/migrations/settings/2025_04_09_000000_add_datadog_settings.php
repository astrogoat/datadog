<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('datadog.site', 'datadoghq.com');
        $this->migrator->add('datadog.track_user_interactions', true);
        $this->migrator->add('datadog.track_resources', true);
        $this->migrator->add('datadog.track_long_tasks', true);
        $this->migrator->add('datadog.enable_privacy_for_action_name', true);
    }

    public function down()
    {
        $this->migrator->delete('datadog.site');
        $this->migrator->delete('datadog.track_user_interactions');
        $this->migrator->delete('datadog.track_resources');
        $this->migrator->delete('datadog.track_long_tasks');
        $this->migrator->delete('datadog.enable_privacy_for_action_name');
    }
};
