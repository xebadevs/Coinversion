<?php

// ------------------------------ cURL: Multiple Instances ------------------------------ //
// cURL_init

use function PHPSTORM_META\type;

$ch_aux = curl_init();
$ch_new = curl_init();

// cURL Queries and Keys
$apiKeyAux = http_build_query([
    'api_token' => '58EXiaAuEbLbp7F4XKY4s90uKz6HFXjtwGf4z8u2',
    'symbols' => 'CC:BTC',
    'filter_entities' => 'true',
    'language' => 'en'
]);
$apiKeyNew = 'apiKey=ae1fa2e325e04d0c9e1a93c6988517e0';

// cURL_urls
$url_aux = sprintf('%s?%s', 'https://api.marketaux.com/v1/news/all', $apiKeyAux);
$url_new = 'https://newsapi.org/v2/everything?domains=wsj.com&' . $apiKeyNew;

// cURL_set_urls and config
curl_setopt($ch_aux, CURLOPT_URL, $url_aux);
curl_setopt($ch_aux, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_new, CURLOPT_URL, $url_new);
curl_setopt($ch_new, CURLOPT_USERAGENT, 'Coinversion/1.0');
curl_setopt($ch_new, CURLOPT_RETURNTRANSFER, true);

// cURL_multiple_handle
$mh = curl_multi_init();

// cURL_insert_handle
curl_multi_add_handle($mh, $ch_aux);
curl_multi_add_handle($mh, $ch_new);

// cURL_do while
do {
    $status = curl_multi_exec($mh, $active);
    if ($active) {
        curl_multi_select($mh);
    }
} while (
    $active && $status == CURLM_OK
);

// cURL_close
curl_multi_remove_handle($mh, $ch_aux);
curl_multi_remove_handle($mh, $ch_new);


// ------------------------------ RESULTS ------------------------------ //

$resp_aux = curl_multi_getcontent($ch_aux);
$resp_new = curl_multi_getcontent($ch_new);

if ($e = curl_error($ch_aux)) {
    echo $e;
} else {
    $dec_aux = json_decode($resp_aux, true);
}

if ($e = curl_error($ch_new)) {
    echo $e;
} else {
    $dec_new = json_decode($resp_new, true);
}


// ------------------------------ VARIABLES ------------------------------ //

for ($i = 0; $i < 3; $i++) {
    ${"aux_source$i"} = ucfirst($dec_aux['data'][$i]['source']);
    ${"aux_desc$i"} = $dec_aux['data'][$i]['description'];
    ${"aux_link$i"} = $dec_aux['data'][$i]['url'];
    ${"new_source$i"} = $dec_new['articles'][$i]['source']['name'];
    ${"new_link$i"} = $dec_new['articles'][$i]['url'];
    ${"new_desc$i"} = $dec_new['articles'][$i]['description'] ?? $dec_new['articles'][$i]['title'];
}


// ------------------------------ RESULTS FALLBACK ------------------------------ //

if (str_contains($resp_aux, "usage_limit_reached") || str_contains($resp_new, "rateLimited")) {
    $aux_source0 = $aux_source1 = $aux_source2 = $new_source0 = $new_source1 = $new_source2 = "API exceeded";
    $aux_desc0 = $aux_desc1 = $aux_desc2 = $new_desc0 = $new_desc1 = $new_desc2 = "The usage limit for this account has been reached. This site have made too many requests recently. Developer accounts are limited to 100 requests over a 24 hour period (50 requests available every 12 hours).";
    $aux_link0 = $aux_link1 = $aux_link2 = $new_link0 = $new_link1 = $new_link2 = "#";
}


// ------------------------------ DOM HELPER ------------------------------ //

function generateBox($source, $desc, $link)
{
    return <<<HTML
        <div class="column is-3 xd-lightshadow has-background-white is-size-4">
            <div class="columns has-background-info">
                <div class="column has-text-centered">
                    <div class="is-inline">
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold">$source</p>
                    </div>
                </div>
            </div>
            <div class="column has-background-white has-text-centered is-mobile xd-box">
                <div class="content has-text-centered m-4 xd-height">
                    <p class="is-size-4">$desc</p>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-12 is-inline has-text-centered has-text-info">
                    <a href="$link" target="_blank">
                        <button class="button is-info is-fullwidth">
                            Go to Source
                        </button>
                    </a>
                </div>
            </div>
        </div>
    HTML;
}

?>

<!-- ---------------------------- HTML DOM, CARDS 1 TO 6 ---------------------------- -->

<section class="section">
    <div class="columns is-centered">
        <?php
        echo generateBox($aux_source0, $aux_desc0, $aux_link0);

        echo '<div class="column is-1"></div>';
        echo generateBox($new_source0, $new_desc0, $new_link0);

        echo '<div class="column is-1"></div>';
        echo generateBox($aux_source1, $aux_desc1, $aux_link1);

        echo '</div><br><br><div class="columns is-centered">';
        echo generateBox($new_source1, $new_desc1, $new_link1);

        echo '<div class="column is-1"></div>';
        echo generateBox($aux_source2, $aux_desc2, $aux_link2);

        echo '<div class="column is-1"></div>';
        echo generateBox($new_source2, $new_desc2, $new_link2);
        ?>
    </div>
</section>