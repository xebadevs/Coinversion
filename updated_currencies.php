<?php
// ------------------------------ cURL: Multiple Instances ------------------------------ //
// cURL_init
$ch_dolar = curl_init();
$ch_dolar_blue = curl_init();
$ch_euro = curl_init();
$ch_real = curl_init();
$ch_pesou = curl_init();
$ch_libra = curl_init();

// cURL_urls
$url_dolar = 'https://api.bluelytics.com.ar/v2/latest';
$url_dolar_blue = 'https://api.bluelytics.com.ar/v2/latest';
$url_euro = 'https://api.economico.infobae.com/financial/asset/?ids=EURPES&range=now';
$url_real = 'https://api.economico.infobae.com/financial/asset/?ids=CMPES&range=now';
$url_pesou = 'https://api.economico.infobae.com/financial/asset/?ids=URUPES&range=now';
$url_libra = 'https://api.economico.infobae.com/financial/asset/?ids=LIBPES&range=now';

// cURL_set_urls and config
curl_setopt_array($ch_dolar, [
    CURLOPT_URL => $url_dolar,
    CURLOPT_RETURNTRANSFER => true
]);
curl_setopt_array($ch_dolar_blue, [
    CURLOPT_URL => $url_dolar_blue,
    CURLOPT_RETURNTRANSFER => true
]);
curl_setopt_array($ch_euro, [
    CURLOPT_URL => $url_euro,
    CURLOPT_RETURNTRANSFER => true
]);
curl_setopt_array($ch_real, [
    CURLOPT_URL => $url_real,
    CURLOPT_RETURNTRANSFER => true
]);
curl_setopt_array($ch_pesou, [
    CURLOPT_URL => $url_pesou,
    CURLOPT_RETURNTRANSFER => true
]);
curl_setopt_array($ch_libra, [
    CURLOPT_URL => $url_libra,
    CURLOPT_RETURNTRANSFER => true
]);

// cURL_multiple_handle
$mh = curl_multi_init();

// cURL_insert_handle
curl_multi_add_handle($mh, $ch_dolar);
curl_multi_add_handle($mh, $ch_dolar_blue);
curl_multi_add_handle($mh, $ch_euro);
curl_multi_add_handle($mh, $ch_real);
curl_multi_add_handle($mh, $ch_pesou);
curl_multi_add_handle($mh, $ch_libra);

//cURL_do while
do {
    $status = curl_multi_exec($mh, $active);
    if ($active) {
        curl_multi_select($mh);
    }
} while (
    $active && $status == CURLM_OK
);

// cURL_close
curl_multi_remove_handle($mh, $ch_dolar);
curl_multi_remove_handle($mh, $ch_dolar_blue);
curl_multi_remove_handle($mh, $ch_euro);
curl_multi_remove_handle($mh, $ch_real);
curl_multi_remove_handle($mh, $ch_pesou);
curl_multi_remove_handle($mh, $ch_libra);


// ------------------------------ RESPONSE ../DOLARSI/COTIZADOR ------------------------------ //
$resp_dolar = curl_multi_getcontent($ch_dolar);

if ($e = curl_error($ch_dolar)) {
    echo $e;
} else {
    $dec_dolar = json_decode($resp_dolar, true);
}

// VARIABLES

var_dump($dec_dolar['oficial']['value_avg']);

$dollarOfficialVar = $dec_dolar['oficial']['value_avg'];
$dollarOfficialBuy = $dec_dolar['oficial']['value_buy'];
$dollarOfficialSell = $dec_dolar['oficial']['value_sell'];



// ------------------------------ RESPONSE: ../DOLARSI/VALORESPRINCIPALES ------------------------------ //

// cURL_responses: ch_valoresprincipales
$resp_dolar_blue = curl_multi_getcontent($ch_dolar_blue);

if ($e = curl_error($ch_dolar_blue)) {
    echo $e;
} else {
    $dec_dolar_blue = json_decode($resp_dolar_blue, true);
}

// VARIABLES
$dollarBlueBuy = $dec_dolar_blue[1]['casa']['compra'];
$dollarBlueSell = $dec_dolar_blue[1]['casa']['venta'];
$dollarBlueVar =  $dec_dolar_blue[1]['casa']['variacion'];

$numbers = [];
for ($i = 0; $i < 10; $i++) {
    $numbers[] = $i;
};

function addSign($val)
{
    global $numbers;

    if (in_array($val, $numbers)) {

        if (substr($val, 0, 1) == "-") {
            return $val . "%";
        } elseif ($val === "0") {
            return $val . ",0" . "%";
        } else {
            return "+" . $val . "%";
        }
    } else {
        return ($val > 0 ? '+' . $val : '-' . $val) . '%';
    }
}

// ------------------------------ RESPONSE: ../INFOBAE/EURO ------------------------------ //

// cURL_responses: ch_euro
$resp_euro = curl_multi_getcontent($ch_euro);

if ($e = curl_error($ch_euro)) {
    echo $e;
} else {
    $dec_euro = json_decode($resp_euro, true);
}


// ------------------------------ RESPONSE: INFOBAE/REAL ------------------------------ //

// cURL_responses: ch_real
$resp_real = curl_multi_getcontent($ch_real);

if ($e = curl_error($ch_real)) {
    echo $e;
} else {
    $dec_real = json_decode($resp_real, true);
}


// ------------------------------ RESPONSE: INFOBAE/PESO(URUGUAY) ------------------------------ //

// cURL_responses: ch_pesou
$resp_pesou = curl_multi_getcontent($ch_pesou);

if ($e = curl_error($ch_pesou)) {
    echo $e;
} else {
    $dec_pesou = json_decode($resp_pesou, true);
}


// ------------------------------ RESPONSE: INFOBAE/LIBRA ------------------------------ //

// cURL_responses: ch_libra
$resp_libra = curl_multi_getcontent($ch_libra);

if ($e = curl_error($ch_libra)) {
    echo $e;
} else {
    $dec_libra = json_decode($resp_libra, true);
}


// ------------------------------ STYLES: RESPONSE COLOR  ------------------------------ //

function colorVar($value)
{
    if (substr($value, 0, 1) === '-') {
        echo '#F14668';
    } else {
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
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold">DOLLAR</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                <div class="column is-4 is-inline has-text-centered">BUY</div>
                <div class="column is-4 is-inline has-text-centered">SELL</div>
                <div class="column is-4 is-inline has-text-centered">VAR</div>
            </div>
            <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                <div class="column is-4 is-inline has-text-centered "><?= $dollarOfficialBuy ?></div>
                <div class="column is-4 is-inline has-text-centered "><?= $dollarOfficialSell ?></div>
                <div class="column is-4 is-inline has-text-centered  has-text-weight-bold" style="color: <?php colorVar($dollarOfficialVar) ?>"><?= addSign($dollarOfficialVar); ?></div>
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
                <div class="column is-4 is-inline has-text-centered"><?= $dec_euro[0]['buy_price'] ?></div>
                <div class="column is-4 is-inline has-text-centered"><?= $dec_euro[0]['sale_price'] ?></div>
                <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($dec_euro[0]['variation']) ?>"><?= $dec_euro[0]['variation'] ?>%</div>
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
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold">REAI</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                <div class="column is-4 is-inline has-text-centered">BUY</div>
                <div class="column is-4 is-inline has-text-centered">SELL</div>
                <div class="column is-4 is-inline has-text-centered">VAR</div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-4 is-inline has-text-centered"><?= $dec_real[0]['buy_price'] ?></div>
                <div class="column is-4 is-inline has-text-centered"><?= $dec_real[0]['sale_price'] ?></div>
                <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($dec_real[0]['variation']) ?>"><?= $dec_real[0]['variation'] ?>%</div>
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
                <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($dollarBlueVar) ?>"><?= addSign($dollarBlueVar); ?></div>
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
                <div class="column is-4 is-inline has-text-centered"><?= $dec_libra[0]['buy_price'] ?></div>
                <div class="column is-4 is-inline has-text-centered"><?= $dec_libra[0]['sale_price'] ?></div>
                <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($dec_libra[0]['variation']) ?>"><?= $dec_libra[0]['variation'] ?>%</div>
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
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold">PESO</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                <div class="column is-4 is-inline has-text-centered">BUY</div>
                <div class="column is-4 is-inline has-text-centered">SELL</div>
                <div class="column is-4 is-inline has-text-centered">VAR</div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-4 is-inline has-text-centered"><?= $dec_pesou[0]['buy_price']; ?></div>
                <div class="column is-4 is-inline has-text-centered"><?= $dec_pesou[0]['sale_price']; ?></div>
                <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($dec_pesou[0]['variation']) ?>"><?= $dec_pesou[0]['variation'] ?>%</div>
            </div>
        </div>
    </div>
</section>