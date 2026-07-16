<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Question;

function translateText($text, $source = 'uz', $target = 'en') {
    $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=" . $source . "&tl=" . $target . "&dt=t&q=" . urlencode($text);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    
    $json = json_decode($response, true);
    $translated = "";
    if (isset($json[0]) && is_array($json[0])) {
        foreach ($json[0] as $segment) {
            $translated .= $segment[0];
        }
    }
    return $translated ?: $text;
}

$questions = Question::all();
$count = 0;

foreach ($questions as $q) {
    $translations = $q->translations;
    
    if (isset($translations['uz_lat'])) {
        $en_q = translateText($translations['uz_lat']['question']);
        $en_options = [];
        
        foreach ($translations['uz_lat']['options'] as $opt) {
            $en_options[] = [
                'id' => $opt['id'],
                'text' => translateText($opt['text'])
            ];
        }
        
        $translations['en'] = [
            'question' => $en_q,
            'options' => $en_options
        ];
        
        // Remove uz_cyr if needed, but keeping it doesn't hurt. We'll just add 'en'.
        
        $q->translations = $translations;
        $q->save();
        $count++;
        echo "Translated question ID {$q->id}\n";
        
        // simple rate limiting to avoid getting blocked
        usleep(100000); 
    }
}

echo "Translation complete. $count questions translated.\n";
