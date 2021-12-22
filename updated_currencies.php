<?php

// ------------------------------ DOLARSI/COTIZADOR ------------------------------ //
// cURL_init
$ch_cotizador = curl_init();
$ch_valprin = curl_init();
$ch_euro = curl_init();
$ch_real = curl_init();
$ch_pesou = curl_init();
$ch_libra = curl_init();

// cURL_urls
$url_cotizador = 'https://www.dolarsi.com/api/api.php?type=cotizador';
$url_valprin = 'https://www.dolarsi.com/api/api.php?type=valoresprincipales';
$url_euro = 'https://api.economico.infobae.com/financial/asset/?ids=EURPES&range=now';
$url_real = 'https://api.economico.infobae.com/financial/asset/?ids=CMPES&range=now';
$url_pesou = 'https://api.economico.infobae.com/financial/asset/?ids=URUPES&range=now';
$url_libra = 'https://api.economico.infobae.com/financial/asset/?ids=LIBPES&range=now';

// cURL_set_urls and config
curl_setopt($ch_cotizador, CURLOPT_URL, $url_cotizador);
curl_setopt($ch_cotizador, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_valprin, CURLOPT_URL, $url_valprin);
curl_setopt($ch_valprin, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_euro, CURLOPT_URL, $url_euro);
curl_setopt($ch_euro, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_real, CURLOPT_URL, $url_real);
curl_setopt($ch_real, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_pesou, CURLOPT_URL, $url_pesou);
curl_setopt($ch_pesou, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_libra, CURLOPT_URL, $url_libra);
curl_setopt($ch_libra, CURLOPT_RETURNTRANSFER, true);

// cURL_multiple_handle
$mh = curl_multi_init();

// cURL_insert_handle
curl_multi_add_handle($mh, $ch_cotizador);
curl_multi_add_handle($mh, $ch_valprin);
curl_multi_add_handle($mh, $ch_euro);
curl_multi_add_handle($mh, $ch_real);
curl_multi_add_handle($mh, $ch_pesou);
curl_multi_add_handle($mh, $ch_libra);

//cURL_do while
do {
    $status = curl_multi_exec($mh, $active);
    if($active){
        curl_multi_select($mh);
    }
}while(
    $active && $status == CURLM_OK
);

// cURL_close
curl_multi_remove_handle($mh, $ch_cotizador);
curl_multi_remove_handle($mh, $ch_valprin);
curl_multi_remove_handle($mh, $ch_euro);
curl_multi_remove_handle($mh, $ch_real);
curl_multi_remove_handle($mh, $ch_pesou);
curl_multi_remove_handle($mh, $ch_libra);


// cURL_responses: ch_cotizador
$resp_cotizador = curl_multi_getcontent($ch_cotizador);

if($e = curl_error($ch_cotizador)){
    echo $e;
}else{
    $dec_cotizador = json_decode($resp_cotizador, true);
    echo '<pre>';
    // var_dump($dec_cotizador);
    echo '</pre>';
}

// Results
echo '<h3>Values from Cotizador</h3>';
echo 'Dollar (Official) Buy: ' . $dec_cotizador[0]['casa']['compra'];
echo '<br>';
echo 'Dollar (Official) Sell: ' . $dec_cotizador[0]['casa']['venta'];
echo '<br>';
echo 'Euro Buy: ' . $dec_cotizador[1]['casa']['compra'];
echo '<br>';
echo 'Euro Sell: ' . $dec_cotizador[1]['casa']['venta'];
echo '<br>';
echo 'Real Buy: ' . $dec_cotizador[2]['casa']['compra'];
echo '<br>';
echo 'Real Sell: ' . $dec_cotizador[2]['casa']['venta'];
echo '<br>';
echo 'Peso (Uruguay) Buy: ' . $dec_cotizador[4]['casa']['compra'];
echo '<br>';
echo 'Peso (Uruguay) Sell: ' . $dec_cotizador[4]['casa']['venta'];
echo '<br>';
echo 'Peso (Chile) Buy: ' . $dec_cotizador[5]['casa']['compra'];
echo '<br>';
echo 'Peso (Chile) Sell: ' . $dec_cotizador[5]['casa']['venta'];
echo '<br>';
echo '<br>';
echo '<hr>';


// ------------------------------ DOLARSI/VALORESPRINCIPALES ------------------------------ //

// cURL_responses: ch_valoresprincipales
$resp_valprin = curl_multi_getcontent($ch_valprin);

if($e = curl_error($ch_valprin)){
    echo $e;
}else{
    $dec_valprin = json_decode($resp_valprin, true);
}

// Results
echo '<h3>Values from ValoresPrincipales</h3>';
echo 'Dollar (Blue) Buy: ' . $dec_valprin[1]['casa']['compra'];
echo '<br>';
echo 'Dollar (Blue) Sell: ' . $dec_valprin[1]['casa']['venta'];
echo '<br>';
echo '<br>';

echo 'Dollar (Blue) Variation: ' . $dec_valprin[1]['casa']['variacion'];
echo '<br>';

echo 'Dollar (Official) Variation: ' . $dec_valprin[0]['casa']['variacion'];
echo '<br>';


// ------------------------------ INFOBAE/EURO ------------------------------ //

// cURL_responses: ch_euro
$resp_euro = curl_multi_getcontent($ch_euro);

if($e = curl_error($ch_euro)){
    echo $e;
}else{
    $dec_euro = json_decode($resp_euro, true);
}

echo 'Euro Variation: ' . $dec_euro[0]['variation'];
echo '<br>';


// ------------------------------ INFOBAE/REAL ------------------------------ //

// cURL_responses: ch_real
$resp_real = curl_multi_getcontent($ch_real);

if($e = curl_error($ch_real)){
    echo $e;
}else{
    $dec_real = json_decode($resp_real, true);
}

echo 'Real Variation: ' . $dec_real[0]['variation'];
echo '<br>';


// ------------------------------ INFOBAE/PESO(URUGUAY) ------------------------------ //

// cURL_responses: ch_pesou
$resp_pesou = curl_multi_getcontent($ch_pesou);

if($e = curl_error($ch_pesou)){
    echo $e;
}else{
    $dec_pesou = json_decode($resp_pesou, true);
}

echo 'Peso (Uruguay) Variation: ' . $dec_pesou[0]['variation'];
echo '<br>';


// ------------------------------ INFOBAE/LIBRA ------------------------------ //

// cURL_responses: ch_libra
$resp_libra = curl_multi_getcontent($ch_libra);

if($e = curl_error($ch_libra)){
    echo $e;
}else{
    $dec_libra = json_decode($resp_libra, true);
}

echo 'Libra Variation: ' . $dec_libra[0]['variation'];
echo '<br>';

?>


<section class="section">
            <div class="columns is-centered">
                <div class="column is-3 xd-lightshadow">
                    <div class="columns has-background-primary">
                        <div class="column has-text-centered">
                            <div class="image is-inline">
                                <img class="is-inline mr-2 image xd-icons" src="./img/eeuu.png" alt="EEUU flag icon">
                            </div>
                            <div class="is-inline">
                                <p class="title is-4 is-inline has-text-white has-text-weight-bold">DOLLAR (Official)</p>
                            </div>
                        </div>
                    </div>
                    <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                        <div class="column is-4 is-inline has-text-centered">BUY</div>
                        <div class="column is-4 is-inline has-text-centered">SELL</div>
                        <div class="column is-4 is-inline has-text-centered">VAR</div>
                    </div>
                    <div class="columns has-background-white has-text-centered is-mobile">
                        <div class="column is-4 is-inline has-text-centered">0,00</div>
                        <div class="column is-4 is-inline has-text-centered">0,00</div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold">0,00</div>
                    </div>
                </div>

                <div class="column is-1"></div>

                <div class="column is-3 xd-lightshadow">
                    <div class="columns has-background-primary">
                        <div class="column has-text-centered">
                            <div class="image is-inline">
                                <img class="is-inline mr-2 image xd-icons" src="./img/eu.png" alt="Europe Union flag icon">
                            </div>
                            <div class="is-inline">
                                <p class="title is-4 is-inline has-text-white has-text-weight-bold">EURO (Official)</p>
                            </div>
                        </div>
                    </div>
                    <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                        <div class="column is-4 is-inline has-text-centered">BUY</div>
                        <div class="column is-4 is-inline has-text-centered">SELL</div>
                        <div class="column is-4 is-inline has-text-centered">VAR</div>
                    </div>
                    <div class="columns has-background-white has-text-centered is-mobile">
                        <div class="column is-4 is-inline has-text-centered">0,00</div>
                        <div class="column is-4 is-inline has-text-centered">0,00</div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold">xxx</div>
                    </div>
                </div>

                <div class="column is-1"></div>

                <div class="column is-3 xd-lightshadow">
                    <div class="columns has-background-primary">
                        <div class="column has-text-centered">
                            <div class="image is-inline">
                                <img class="is-inline mr-2 image xd-icons" src="./img/bra.png" alt="Brasil flag icon">
                            </div>
                            <div class="is-inline">
                                <p class="title is-4 is-inline has-text-white has-text-weight-bold">REAI(Brasil)</p>
                            </div>
                        </div>
                    </div>
                    <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                        <div class="column is-4 is-inline has-text-centered">BUY</div>
                        <div class="column is-4 is-inline has-text-centered">SELL</div>
                        <div class="column is-4 is-inline has-text-centered">VAR</div>
                    </div>
                    <div class="columns has-background-white has-text-centered is-mobile">
                        <div class="column is-4 is-inline has-text-centered">101.56</div>
                        <div class="column is-4 is-inline has-text-centered">107.56</div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold">xxx</div>
                    </div>
                </div>
            </div>

            <br><br>

            <div class="columns is-centered">
                <div class="column is-3 xd-lightshadow">
                    <div class="columns has-background-primary">
                        <div class="column has-text-centered">
                            <div class="image is-inline">
                                <img class="is-inline mr-2 image xd-icons" src="./img/eeuu.png" alt="EEUU flag icon">
                            </div>
                            <div class="is-inline">
                                <p class="title is-4 is-inline has-text-white has-text-weight-bold">DOLLAR (Blue)</p>
                            </div>
                        </div>
                    </div>
                    <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                        <div class="column is-4 is-inline has-text-centered">BUY</div>
                        <div class="column is-4 is-inline has-text-centered">SELL</div>
                        <div class="column is-4 is-inline has-text-centered">VAR</div>
                    </div>
                    <div class="columns has-background-white has-text-centered is-mobile">
                        <div class="column is-4 is-inline has-text-centered">100.13</div>
                        <div class="column is-4 is-inline has-text-centered">107.56</div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold">0.36%</div>
                    </div>
                </div>

                <div class="column is-1"></div>

                <div class="column is-3 xd-lightshadow">
                    <div class="columns has-background-primary">
                        <div class="column has-text-centered">
                            <div class="image is-inline">
                                <img class="is-inline mr-2 image xd-icons" src="./img/chi.png" alt="Chile flag icon">
                            </div>
                            <div class="is-inline">
                                <p class="title is-4 is-inline has-text-white has-text-weight-bold">PESO (Chile)</p>
                            </div>
                        </div>
                    </div>
                    <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                        <div class="column is-4 is-inline has-text-centered">BUY</div>
                        <div class="column is-4 is-inline has-text-centered">SELL</div>
                        <div class="column is-4 is-inline has-text-centered">VAR</div>
                    </div>
                    <div class="columns has-background-white has-text-centered is-mobile">
                        <div class="column is-4 is-inline has-text-centered">101.56</div>
                        <div class="column is-4 is-inline has-text-centered">107.56</div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold">xxx</div>
                    </div>
                </div>

                <div class="column is-1"></div>

                <div class="column is-3 xd-lightshadow">
                    <div class="columns has-background-primary">
                        <div class="column has-text-centered">
                            <div class="image is-inline">
                                <img class="is-inline mr-2 image xd-icons" src="./img/uru.png" alt="Uruguay flag icon">
                            </div>
                            <div class="is-inline">
                                <p class="title is-4 is-inline has-text-white has-text-weight-bold">PESO (Uruguay)</p>
                            </div>
                        </div>
                    </div>
                    <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                        <div class="column is-4 is-inline has-text-centered">BUY</div>
                        <div class="column is-4 is-inline has-text-centered">SELL</div>
                        <div class="column is-4 is-inline has-text-centered">VAR</div>
                    </div>
                    <div class="columns has-background-white has-text-centered is-mobile">
                        <div class="column is-4 is-inline has-text-centered">101.56</div>
                        <div class="column is-4 is-inline has-text-centered">107.56</div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold">xxx</div>
                    </div>
                </div>
            </div>
    </section>