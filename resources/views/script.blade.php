@if(Astrogoat\Datadog\Settings\DatadogSettings::isEnabled())
    @php
        $setting = app(Astrogoat\Datadog\Settings\DatadogSettings::class);
    @endphp
{{--    @push('body')--}} {{-- Uncomment this line if you want to push the script to the end of the body --}}
        <script>
            (function(h,o,u,n,d) {
                h=h[d]=h[d]||{q:[],onReady:function(c){h.q.push(c)}}
                d=o.createElement(u);d.async=1;d.src=n
                n=o.getElementsByTagName(u)[0];n.parentNode.insertBefore(d,n)
            })(window,document,'script','https://www.datadoghq-browser-agent.com/us1/v6/datadog-rum.js','DD_RUM')
            window.DD_RUM.onReady(function() {
                window.DD_RUM.init({
                    clientToken: '{{ $setting->client_token }}',
                    applicationId: '{{ $setting->application_id }}',
                    site: 'datadoghq.com',
                    service: 'stratasphere',
                    env: '{{ env('APP_ENV') }}',
                    // Specify a version number to identify the deployed version of your application in Datadog
                    // version: '1.0.0',
                    sessionSampleRate: {{ $setting->session_sample_rate }},
                    sessionReplaySampleRate: {{ $setting->session_replay_sample_rate }},
                    defaultPrivacyLevel: '{{ $setting->default_privacy_level }}',
                });
            })
        </script>
{{--    @endpush--}}
@endif
