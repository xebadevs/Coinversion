<?php
    // ------------------------------ cURL: Multiple Instances ------------------------------ //
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


    // ------------------------------ RESPONSE ../DOLARSI/COTIZADOR ------------------------------ //
    $resp_cotizador = curl_multi_getcontent($ch_cotizador);

    if($e = curl_error($ch_cotizador)){
        echo $e;
    }else{
        $dec_cotizador = json_decode($resp_cotizador, true);
    }

    // VARIABLES
    $dollarOfficialBuy = $dec_cotizador[0]['casa']['compra'];
    $dollarOfficialSell = $dec_cotizador[0]['casa']['venta'];
    $euroBuy = $dec_cotizador[1]['casa']['compra'];
    $euroSell = $dec_cotizador[1]['casa']['venta'];
    $realBuy = $dec_cotizador[2]['casa']['compra'];
    $realSell = $dec_cotizador[2]['casa']['venta'];
    $pesoUruguayBuy = $dec_cotizador[4]['casa']['compra'];
    $pesoUruguaySell = $dec_cotizador[4]['casa']['venta'];


    // ------------------------------ RESPONSE: ../DOLARSI/VALORESPRINCIPALES ------------------------------ //

    // cURL_responses: ch_valoresprincipales
    $resp_valprin = curl_multi_getcontent($ch_valprin);

    if($e = curl_error($ch_valprin)){
        echo $e;
    }else{
        $dec_valprin = json_decode($resp_valprin, true);
    }

    // VARIABLES
    $dollarBlueBuy = $dec_valprin[1]['casa']['compra'];
    $dollarBlueSell = $dec_valprin[1]['casa']['venta'];
    $dollarBlueVar =  $dec_valprin[1]['casa']['variacion'];
    $dollarOfficialVar = $dec_valprin[0]['casa']['variacion'];


    // ------------------------------ RESPONSE: ../INFOBAE/EURO ------------------------------ //

    // cURL_responses: ch_euro
    $resp_euro = curl_multi_getcontent($ch_euro);

    if($e = curl_error($ch_euro)){
        echo $e;
    }else{
        $dec_euro = json_decode($resp_euro, true);
    }

    // VARIABLES
    $euroVar = $dec_euro[0]['variation'];


    // ------------------------------ RESPONSE: INFOBAE/REAL ------------------------------ //

    // cURL_responses: ch_real
    $resp_real = curl_multi_getcontent($ch_real);

    if($e = curl_error($ch_real)){
        echo $e;
    }else{
        $dec_real = json_decode($resp_real, true);
    }

    // VARIABLES
    $realVar = $dec_real[0]['variation'];


    // ------------------------------ RESPONSE: INFOBAE/PESO(URUGUAY) ------------------------------ //

    // cURL_responses: ch_pesou
    $resp_pesou = curl_multi_getcontent($ch_pesou);

    if($e = curl_error($ch_pesou)){
        echo $e;
    }else{
        $dec_pesou = json_decode($resp_pesou, true);
    }

    // VARIABLES

    $pesoUruguayVar = $dec_pesou[0]['variation'];


    // ------------------------------ RESPONSE: INFOBAE/LIBRA ------------------------------ //

    // cURL_responses: ch_libra
    $resp_libra = curl_multi_getcontent($ch_libra);

    if($e = curl_error($ch_libra)){
        echo $e;
    }else{
        $dec_libra = json_decode($resp_libra, true);
    }

    // VARIABLES
    $libraBuy = $dec_libra[0]['buy_price'];
    $libreSell = $dec_libra[0]['sale_price'];
    $libraVar = $dec_libra[0]['variation'];


    // ------------------------------ STYLES: RESPONSE COLOR  ------------------------------ //

    function colorVar($value){
        if(substr($value, 0, 1) === '-'){
            echo '#F14668';
        }else{
            echo '#00D1B2';
        }
    }

?>


<section class="section">
            <div class="columns is-centered">
                <div class="column is-3 xd-lightshadow has-background-white">
                    <div class="columns has-background-primary">
                        <div class="column has-text-centered">
                            <div class="image is-inline">
                                <img class="is-inline mr-2 image xd-icons" src="./img/eeuu.png" alt="EEUU flag icon">
                            </div>
                            <div class="is-inline">
                                <p class="title is-4 is-inline has-text-white has-text-weight-bold">DOLLAR (Off)</p>
                            </div>
                        </div>
                    </div>
                    <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                        <div class="column is-4 is-inline has-text-centered">BUY</div>
                        <div class="column is-4 is-inline has-text-centered">SELL</div>
                        <div class="column is-4 is-inline has-text-centered">VAR</div>
                    </div>
                    <div class="columns has-background-white has-text-centered is-mobile">
                        <div class="column is-4 is-inline has-text-centered"><?= $dollarOfficialBuy ?></div>
                        <div class="column is-4 is-inline has-text-centered"><?= $dollarOfficialSell ?></div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($dollarOfficialVar) ?>"><?= $dollarOfficialVar ?>%</div>
                    </div>
                </div>

                <div class="column is-1"></div>

                <div class="column is-3 xd-lightshadow has-background-white">
                    <div class="columns has-background-primary">
                        <div class="column has-text-centered">
                            <div class="image is-inline">
                                <img class="is-inline mr-2 image xd-icons" src="./img/eu.png" alt="Europe Union flag icon">
                            </div>
                            <div class="is-inline">
                                <p class="title is-4 is-inline has-text-white has-text-weight-bold">EURO</p>
                            </div>
                        </div>
                    </div>
                    <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                        <div class="column is-4 is-inline has-text-centered">BUY</div>
                        <div class="column is-4 is-inline has-text-centered">SELL</div>
                        <div class="column is-4 is-inline has-text-centered">VAR</div>
                    </div>
                    <div class="columns has-background-white has-text-centered is-mobile">
                        <div class="column is-4 is-inline has-text-centered"><?= $euroBuy ?></div>
                        <div class="column is-4 is-inline has-text-centered"><?= $euroSell ?></div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($euroVar) ?>"><?= $euroVar ?>%</div>
                    </div>
                </div>

                <div class="column is-1"></div>

                <div class="column is-3 xd-lightshadow has-background-white">
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
                        <div class="column is-4 is-inline has-text-centered"><?= $realBuy ?></div>
                        <div class="column is-4 is-inline has-text-centered"><?= $realSell ?></div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($realVar) ?>"><?= $realVar ?>%</div>
                    </div>
                </div>
            </div>

            <br><br>

            <div class="columns is-centered">
                <div class="column is-3 xd-lightshadow has-background-white">
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
                        <div class="column is-4 is-inline has-text-centered"><?= $dollarBlueBuy ?></div>
                        <div class="column is-4 is-inline has-text-centered"><?= $dollarBlueSell ?></div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($dollarBlueVar) ?>"><?= $dollarBlueVar ?>%</div>
                    </div>
                </div>

                <div class="column is-1"></div>

                <div class="column is-3 xd-lightshadow has-background-white">
                    <div class="columns has-background-primary">
                        <div class="column has-text-centered">
                            <div class="image is-inline">
                                <img class="is-inline mr-2 image xd-icons" src="./img/uk.png" alt="United Kingdom flag icon">
                            </div>
                            <div class="is-inline">
                                <p class="title is-4 is-inline has-text-white has-text-weight-bold">POUND ST</p>
                            </div>
                        </div>
                    </div>
                    <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                        <div class="column is-4 is-inline has-text-centered">BUY</div>
                        <div class="column is-4 is-inline has-text-centered">SELL</div>
                        <div class="column is-4 is-inline has-text-centered">VAR</div>
                    </div>
                    <div class="columns has-background-white has-text-centered is-mobile">
                        <div class="column is-4 is-inline has-text-centered"><?= $libraBuy ?></div>
                        <div class="column is-4 is-inline has-text-centered"><?= $libreSell ?></div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($libraVar) ?>"><?= $libraVar ?>%</div>
                    </div>
                </div>

                <div class="column is-1"></div>

                <div class="column is-3 xd-lightshadow has-background-white">
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
                        <div class="column is-4 is-inline has-text-centered"><?= $pesoUruguayBuy ?></div>
                        <div class="column is-4 is-inline has-text-centered"><?= $pesoUruguaySell ?></div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($pesoUruguayVar) ?>"><?= $pesoUruguayVar ?>%</div>
                    </div>
                </div>
            </div>
    </section>