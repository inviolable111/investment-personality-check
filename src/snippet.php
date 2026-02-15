add_action('wp_ajax_get_investalo_analysis', 'get_investalo_analysis');
add_action('wp_ajax_nopriv_get_investalo_analysis', 'get_investalo_analysis');

function get_investalo_analysis() {

    // Nur POST erlauben
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_send_json_error('Ungültige Methode.');
    }

    // Prüfen ob alle nötigen Daten da sind
    if (empty($_POST['type_label']) || empty($_POST['dimensions'])) {
        wp_send_json_error('Unvollständige Anfrage.');
    }

    $api_key = get_option('investalo_openai_key');
    if (!$api_key) {
        wp_send_json_error('API Key fehlt.');
    }

    // Daten säubern und auf gültige Werte prüfen
    $type_label = sanitize_text_field($_POST['type_label']);
    $dimensions = $_POST['dimensions'];

    $risiko = max(0, min(100, (int)($dimensions['risiko'] ?? 50)));
    $finanz = max(0, min(100, (int)($dimensions['finanzkraft'] ?? 50)));
    $wissen = max(0, min(100, (int)($dimensions['wissen'] ?? 50)));
    $zeit   = max(0, min(100, (int)($dimensions['zeit'] ?? 50)));

    // System-Prompt für OpenAI
    $system_prompt = <<<SYS
Du bist INVESTALO.
Ein ruhiger, empathischer Finanz-Persönlichkeitsagent.
Keine Anlageberatung. Keine Produkte. Keine Prognosen.
Maximal 150 Wörter.
SYS;

    // Profil als JSON für das Prompt
    $profile = json_encode([
        'Typ' => $type_label,
        'Risiko' => $risiko,
        'Finanzkraft' => $finanz,
        'Wissen' => $wissen,
        'Zeit' => $zeit
    ], JSON_UNESCAPED_UNICODE);

    $task = "Erkläre dem Nutzer ruhig und verständlich, was dieses Profil für seinen Start bedeutet.";

    // OpenAI Anfrage
    $response = wp_remote_post(
        'https://api.openai.com/v1/chat/completions',
        [
            'timeout' => 20,
            'headers' => [
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type' => 'application/json'
            ],
            'body' => wp_json_encode([
                'model' => 'gpt-4o-mini',
                'temperature' => 0.6,
                'messages' => [
                    ['role' => 'system', 'content' => $system_prompt],
                    ['role' => 'user', 'content' => "Profil:\n$profile"],
                    ['role' => 'user', 'content' => $task],
                ]
            ])
        ]
    );

    // Fehler prüfen
    if (is_wp_error($response)) {
        wp_send_json_error('KI nicht erreichbar.');
    }

    $body = json_decode(wp_remote_retrieve_body($response), true);
    $text = $body['choices'][0]['message']['content'] ?? '';

    if (!$text) {
        wp_send_json_error('Leere Antwort.');
    }

    // Sicher ausgeben
    wp_send_json_success(wp_kses_post($text));
}add_action('wp_ajax_get_investalo_analysis', 'get_investalo_analysis');
add_action('wp_ajax_nopriv_get_investalo_analysis', 'get_investalo_analysis');

function get_investalo_analysis() {

    // Nur POST erlauben
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_send_json_error('Ungültige Methode.');
    }

    // Prüfen ob alle nötigen Daten da sind
    if (empty($_POST['type_label']) || empty($_POST['dimensions'])) {
        wp_send_json_error('Unvollständige Anfrage.');
    }

    $api_key = get_option('investalo_openai_key');
    if (!$api_key) {
        wp_send_json_error('API Key fehlt.');
    }

    // Daten säubern und auf gültige Werte prüfen
    $type_label = sanitize_text_field($_POST['type_label']);
    $dimensions = $_POST['dimensions'];

    $risiko = max(0, min(100, (int)($dimensions['risiko'] ?? 50)));
    $finanz = max(0, min(100, (int)($dimensions['finanzkraft'] ?? 50)));
    $wissen = max(0, min(100, (int)($dimensions['wissen'] ?? 50)));
    $zeit   = max(0, min(100, (int)($dimensions['zeit'] ?? 50)));

    // System-Prompt für OpenAI
    $system_prompt = <<<SYS
Du bist INVESTALO.
Ein ruhiger, empathischer Finanz-Persönlichkeitsagent.
Keine Anlageberatung. Keine Produkte. Keine Prognosen.
Maximal 150 Wörter.
SYS;

    // Profil als JSON für das Prompt
    $profile = json_encode([
        'Typ' => $type_label,
        'Risiko' => $risiko,
        'Finanzkraft' => $finanz,
        'Wissen' => $wissen,
        'Zeit' => $zeit
    ], JSON_UNESCAPED_UNICODE);

    $task = "Erkläre dem Nutzer ruhig und verständlich, was dieses Profil für seinen Start bedeutet.";

    // OpenAI Anfrage
    $response = wp_remote_post(
        'https://api.openai.com/v1/chat/completions',
        [
            'timeout' => 20,
            'headers' => [
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type' => 'application/json'
            ],
            'body' => wp_json_encode([
                'model' => 'gpt-4o-mini',
                'temperature' => 0.6,
                'messages' => [
                    ['role' => 'system', 'content' => $system_prompt],
                    ['role' => 'user', 'content' => "Profil:\n$profile"],
                    ['role' => 'user', 'content' => $task],
                ]
            ])
        ]
    );

    // Fehler prüfen
    if (is_wp_error($response)) {
        wp_send_json_error('KI nicht erreichbar.');
    }

    $body = json_decode(wp_remote_retrieve_body($response), true);
    $text = $body['choices'][0]['message']['content'] ?? '';

    if (!$text) {
        wp_send_json_error('Leere Antwort.');
    }

    // Sicher ausgeben
    wp_send_json_success(wp_kses_post($text));
}