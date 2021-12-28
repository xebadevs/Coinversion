<?php

// ------------------------------ cURL: Multiple Instances ------------------------------ //
    // cURL_init
    $ch_aux = curl_init();
    $ch_new = curl_init();

    // cURL Queries and Keys
    $queryString_aux = http_build_query([
        'api_token' => '58EXiaAuEbLbp7F4XKY4s90uKz6HFXjtwGf4z8u2',
        'symbols' => 'CC:BTC',
        'filter_entities' => 'true',
        'language' => 'en'
    ]);
    $queryString_new = 'apiKey=ae1fa2e325e04d0c9e1a93c6988517e0';

    // cURL_urls
    $url_aux = sprintf('%s?%s', 'https://api.marketaux.com/v1/news/all', $queryString_aux);
    $url_new = 'https://newsapi.org/v2/everything?domains=wsj.com&' . $queryString_new;

    // cURL_set_urls and config
    curl_setopt($ch_aux, CURLOPT_URL, $url_aux);
    curl_setopt($ch_aux, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch_new, CURLOPT_URL, $url_new);
    curl_setopt($ch_new, CURLOPT_RETURNTRANSFER, true);

    // cURL_multiple_handle
    $mh = curl_multi_init();

    // cURL_insert_handle
    curl_multi_add_handle($mh, $ch_aux);
    curl_multi_add_handle($mh, $ch_new);

    // cURL_do while
    do {
        $status = curl_multi_exec($mh, $active);
        if($active){
            curl_multi_select($mh);
        }
    }while(
        $active && $status == CURLM_OK
    );

    // cURL_close
    curl_multi_remove_handle($mh, $ch_aux);
    curl_multi_remove_handle($mh, $ch_new);


// ------------------------------ RESULTS ------------------------------ //

$resp_aux = curl_multi_getcontent($ch_aux);
$resp_new = curl_multi_getcontent($ch_new);

if($e = curl_error($ch_aux)){
    echo $e;
}else{
    $dec_aux = json_decode($resp_aux, true);
}

if($e = curl_error($ch_new)){
    echo $e;
}else{
    $dec_new = json_decode($resp_new, true);
}


// ------------------------------ VARIABLES ------------------------------ //

$aux_source0 = ucfirst($dec_aux['data'][0]['source']);
$aux_desc0 = $dec_aux['data'][0]['description'];
$aux_link0 = $dec_aux['data'][0]['url'];
$aux_source1 = ucfirst($dec_aux['data'][1]['source']);
$aux_desc1 = $dec_aux['data'][1]['description'];
$aux_link1 = $dec_aux['data'][1]['url'];
$aux_source2 = ucfirst($dec_aux['data'][2]['source']);
$aux_desc2 = $dec_aux['data'][2]['description'];
$aux_link2 = $dec_aux['data'][2]['url'];

$new_source0 = $dec_new['articles'][0]['source']['name'];
$new_link0 = $dec_new['articles'][0]['url'];
$new_desc0 = $dec_new['articles'][0]['description'];
$new_source1 = $dec_new['articles'][1]['source']['name'];
$new_link1 = $dec_new['articles'][1]['url'];
$new_desc1 = $dec_new['articles'][1]['description'];
$new_source2 = $dec_new['articles'][2]['source']['name'];
$new_link2 = $dec_new['articles'][2]['url'];
$new_desc2 = $dec_new['articles'][2]['description'];
?>





<!-- ---------------------------- HTML DOM ---------------------------- -->

<!-- ---------- First box ---------- -->

<h3><a href=""></a></h3>

<section class="section">
    <div class="columns is-centered">
        <div class="column is-3 xd-lightshadow has-background-white is-size-4">
            <div class="columns has-background-info">
                <div class="column has-text-centered">
                    <div class="is-inline">
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold"> <?= $aux_source0 ?> </p>
                    </div>
                </div>
            </div>
            <div class="column has-background-white has-text-centered xd-nborder is-mobile">
                <div class="content has-text-centered m-4 xd-height">
                    <p class="is-size-4"> <?= $aux_desc0 ?> </p>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-12 is-inline has-text-centered has-text-info xd-bright"><a href=" <?= $aux_link0 ?> " target="_blank">Go to Source</a></div>
            </div>
        </div>

        <div class="column is-1"></div>


<!-- ---------- Second box ---------- -->

        <div class="column is-3 xd-lightshadow has-background-white is-size-4">
            <div class="columns has-background-info">
                <div class="column has-text-centered">
                    <div class="is-inline">
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold"> <?= $new_source0 ?> </p>
                    </div>
                </div>
            </div>
            <div class="column has-background-white has-text-centered xd-nborder is-mobile">
                <div class="content has-text-centered m-4 xd-height">
                    <p class="is-size-4"> <?= $new_desc0 ?> </p>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-12 is-inline has-text-centered has-text-info xd-bright"><a href=" <?= $new_link0 ?> " target="_blank">Go to Source</a></div>
            </div>
        </div>

        <div class="column is-1"></div>


<!-- ---------- Third box ---------- -->

        <div class="column is-3 xd-lightshadow has-background-white is-size-4">
            <div class="columns has-background-info">
                <div class="column has-text-centered">
                    <div class="is-inline">
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold"> <?= $aux_source1 ?> </p>
                    </div>
                </div>
            </div>
            <div class="column has-background-white has-text-centered xd-nborder is-mobile">
                <div class="content has-text-centered m-4 xd-height">
                    <p class="is-size-4"> <?= $aux_desc1 ?> </p>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-12 is-inline has-text-centered has-text-info xd-bright"><a href=" <?= $aux_link1 ?> " target="_blank">Go to Source</a></div>
            </div>
        </div>
    </div>

    <br><br>

<!-- ---------- Fourth box ---------- -->

    <div class="columns is-centered">
        <div class="column is-3 xd-lightshadow has-background-white is-size-4">
            <div class="columns has-background-info">
                <div class="column has-text-centered">
                    <div class="is-inline">
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold"> <?= $new_source1 ?> </p>
                    </div>
                </div>
            </div>
            <div class="column has-background-white has-text-centered xd-nborder is-mobile">
                <div class="content has-text-centered m-4 xd-height">
                    <p class="is-size-4"> <?= $new_desc1 ?> </p>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-12 is-inline has-text-centered has-text-info xd-bright"><a href=" <?= $new_link1 ?> " target="_blank">Go to Source</a></div>
            </div>
        </div>

        <div class="column is-1"></div>


<!-- ---------- Fifth box ---------- -->
        <div class="column is-3 xd-lightshadow has-background-white is-size-4">
            <div class="columns has-background-info">
                <div class="column has-text-centered">
                    <div class="is-inline">
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold"> <?= $aux_source2 ?> </p>
                    </div>
                </div>
            </div>
            <div class="column has-background-white has-text-centered xd-nborder is-mobile">
                <div class="content has-text-centered m-4 xd-height">
                    <p class="is-size-4"> <?= $aux_desc2 ?> </p>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-12 is-inline has-text-centered has-text-info xd-bright"><a href=" <?= $aux_link2 ?> " target="_blank">Go to Source</a></div>
            </div>
        </div>

        <div class="column is-1"></div>


<!-- ---------- Sixth box ---------- -->

        <div class="column is-3 xd-lightshadow has-background-white is-size-4">
            <div class="columns has-background-info">
                <div class="column has-text-centered">
                    <div class="is-inline">
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold"> <?= $new_source2 ?> </p>
                    </div>
                </div>
            </div>
            <div class="column has-background-white has-text-centered xd-nborder is-mobile">
                <div class="content has-text-centered m-4 xd-height">
                    <p class="is-size-4"> <?= $new_desc2 ?> </p>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-12 is-inline has-text-centered has-text-info xd-bright"><a href=" <?= $new_link2 ?> " target="_blank">Go to Source</a></div>
            </div>
        </div>
    </div>
</section>