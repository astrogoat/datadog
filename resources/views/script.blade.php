@php
    use Helix\Lego\Facades\Strata;
    $settings = app(Astrogoat\Datadog\Settings\DatadogSettings::class);
@endphp

@if($settings->enabled)
    <script>
        (function(h,o,u,n,d) {
            h=h[d]=h[d]||{q:[],onReady:function(c){h.q.push(c)}}
            d=o.createElement(u);d.async=1;d.src=n
            n=o.getElementsByTagName(u)[0];n.parentNode.insertBefore(d,n)
        })(window,document,'script','https://www.datadoghq-browser-agent.com/us1/v6/datadog-rum.js','DD_RUM')
        window.DD_RUM.onReady(function() {
            window.DD_RUM.init({
                clientToken: '{{ $settings->client_token }}',
                applicationId: '{{ $settings->application_id }}',
                site: '{{ $settings->site }}',
                service: '{{ tenant()->id }}',
                env: '{{ config('app.env') }}',
                @if(Strata::appVersion())
                    version: '{{ Str::before(Strata::appVersion(), ' ') }}',
                @endif
                sessionSampleRate: {{ $settings->session_sample_rate }},
                sessionReplaySampleRate: {{ $settings->session_replay_sample_rate }},
                defaultPrivacyLevel: '{{ $settings->default_privacy_level }}',
                trackUserInteractions: {{ $settings->track_user_interactions ? 'true' : 'false' }},
                trackResources: {{ $settings->track_resources ? 'true' : 'false' }},
                trackLongTasks: {{ $settings->track_long_tasks ? 'true' : 'false' }},
                enablePrivacyForActionName: {{ $settings->enable_privacy_for_action_name ? 'true' : 'false' }},

            });
        })
    </script>
@endif
