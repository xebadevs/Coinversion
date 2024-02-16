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

// ------------------------------ CURRENCY RESPONSES ------------------------------ //

// cURL_responses: dolar
$resp_dolar = curl_multi_getcontent($ch_dolar);
$dec_dolar = ($e = curl_error($ch_dolar)) ? $e : json_decode($resp_dolar, true);

// cURL_responses: dolar_blue
$resp_dolar_blue = curl_multi_getcontent($ch_dolar_blue);
$dec_dolar_blue = ($e = curl_error($ch_dolar_blue)) ? $e : json_decode($resp_dolar_blue, true);

// cURL_responses: ch_euro
$resp_euro = curl_multi_getcontent($ch_euro);
$dec_euro = ($e = curl_error($ch_euro)) ? $e : json_decode(curl_multi_getcontent($ch_euro), true);

// cURL_responses: ch_real
$resp_real = curl_multi_getcontent($ch_real);
$dec_real = ($e = curl_error($ch_real)) ? $e : json_decode(curl_multi_getcontent($ch_real), true);

// cURL_responses: ch_pesou
$resp_pesou = curl_multi_getcontent($ch_pesou);
$dec_pesou = ($e = curl_error($ch_pesou)) ? $e : json_decode(curl_multi_getcontent($ch_pesou), true);

// cURL_responses: ch_libra
$resp_libra = curl_multi_getcontent($ch_libra);
$dec_libra = ($e = curl_error($ch_libra)) ? $e : json_decode(curl_multi_getcontent($ch_libra), true);


// ------------------------------ HELPERS ------------------------------ //

function colorVar($value)
{
    if (substr($value, 0, 1) === '-') {
        echo '#F14668';
    } else {
        echo '#00D1B2';
    }
}

function drawChartTitles()
{
    return '
        <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
            <div class="column is-4 is-inline has-text-centered">BUY</div>
            <div class="column is-4 is-inline has-text-centered">SELL</div>
            <div class="column is-4 is-inline has-text-centered">VAR</div>
        </div>
    ';
}

function drawChartHeader($imageSrc, $altText, $titleText)
{
    return "
        <div class='columns has-background-primary'>
            <div class='column has-text-centered'>
                <div class='image is-inline'>
                    <img class='is-inline mr-2 image xd-icons' src='$imageSrc' alt='$altText'>
                </div>
                <div class='is-inline'>
                    <p class='title is-4 is-inline has-text-white has-text-weight-bold'>$titleText</p>
                </div>
            </div>
        </div>
    ";
}

?>

<!-- ---------------------------- HTML DOM ---------------------------- -->

<section class="section">
    <div class="columns is-centered">
        <div class="column is-3 xd-lightshadow has-background-white">
            <?php echo drawChartHeader("./img/eeuu.png", "EEUU flag icon", "DOLLAR") ?>
            <?php echo drawChartTitles() ?>

            <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
                <div class="column is-4 is-inline has-text-centered"><?= $dec_dolar['oficial']['value_buy']; ?></div>
                <div class="column is-4 is-inline has-text-centered"><?= $dec_dolar['oficial']['value_sell']; ?></div>
                <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($dec_dolar['oficial']['value_avg'] * 0.001) ?>"><?= addSign(sprintf("%.1f", $dec_dolar['oficial']['value_avg'] * 0.001)); ?></div>
            </div>
        </div>

        <div class="column is-1"></div>

        <div class="column is-3 xd-lightshadow has-background-white">
            <?php echo drawChartHeader("./img/eu.png", "Europe Union flag icon", "EURO") ?>
            <?php echo drawChartTitles() ?>

            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-4 is-inline has-text-centered"><?= $dec_euro[0]['buy_price'] ?></div>
                <div class="column is-4 is-inline has-text-centered"><?= $dec_euro[0]['sale_price'] ?></div>
                <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($dec_euro[0]['variation']) ?>"><?= $dec_euro[0]['variation'] ?>%</div>
            </div>
        </div>

        <div class="column is-1"></div>

        <div class="column is-3 xd-lightshadow has-background-white">
            <?php echo drawChartHeader("./img/bra.png", "Brasil flag icon", "REAI") ?>
            <?php echo drawChartTitles() ?>

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
            <?php echo drawChartHeader("./img/eeuu.png", "EEUU flag icon", "DOLLAR (Blue)") ?>
            <?php echo drawChartTitles() ?>

            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-4 is-inline has-text-centered"><?= $dec_dolar_blue['blue']['value_buy'] ?></div>
                <div class="column is-4 is-inline has-text-centered"><?= $dec_dolar_blue['blue']['value_sell'] ?></div>
                <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($dec_dolar_blue['blue']['value_avg']) ?>"><?= addSign(sprintf("%.1f", $dec_dolar_blue['blue']['value_avg'] * 0.001)); ?></div>
            </div>
        </div>

        <div class="column is-1"></div>

        <div class="column is-3 xd-lightshadow has-background-white">
            <?php echo drawChartHeader("./img/uk.png", "United Kingdom flag icon", "POUND ST") ?>
            <?php echo drawChartTitles() ?>

            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-4 is-inline has-text-centered"><?= $dec_libra[0]['buy_price'] ?></div>
                <div class="column is-4 is-inline has-text-centered"><?= $dec_libra[0]['sale_price'] ?></div>
                <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($dec_libra[0]['variation']) ?>"><?= $dec_libra[0]['variation'] ?>%</div>
            </div>
        </div>

        <div class="column is-1"></div>

        <div class="column is-3 xd-lightshadow has-background-white">
            <?php echo drawChartHeader("./img/uru.png", "Uruguay flag icon", "PESO") ?>
            <?php echo drawChartTitles() ?>

            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-4 is-inline has-text-centered"><?= $dec_pesou[0]['buy_price']; ?></div>
                <div class="column is-4 is-inline has-text-centered"><?= $dec_pesou[0]['sale_price']; ?></div>
                <div class="column is-4 is-inline has-text-centered has-text-weight-bold" style="color: <?php colorVar($dec_pesou[0]['variation']) ?>"><?= $dec_pesou[0]['variation'] ?>%</div>
            </div>
        </div>
    </div>
</section>