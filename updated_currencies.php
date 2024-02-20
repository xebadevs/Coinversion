<?php

// cURL initialization
function curl_get_contents($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

// cURL URLs
$url_dolar = 'https://api.bluelytics.com.ar/v2/latest';
$url_dolar_blue = 'https://api.bluelytics.com.ar/v2/latest';
$url_euro = 'https://api.economico.infobae.com/financial/asset/?ids=EURPES&range=now';
$url_real = 'https://api.economico.infobae.com/financial/asset/?ids=CMPES&range=now';
$url_pesou = 'https://api.economico.infobae.com/financial/asset/?ids=URUPES&range=now';
$url_libra = 'https://api.economico.infobae.com/financial/asset/?ids=LIBPES&range=now';

// Fetching
$dec_dolar = json_decode(curl_get_contents($url_dolar), true);
$dec_dolar_blue = json_decode(curl_get_contents($url_dolar_blue), true);
$dec_euro = json_decode(curl_get_contents($url_euro), true);
$dec_real = json_decode(curl_get_contents($url_real), true);
$dec_pesou = json_decode(curl_get_contents($url_pesou), true);
$dec_libra = json_decode(curl_get_contents($url_libra), true);

// Numeric values format
function addSign($val)
{
    if ($val > 0) {
        return '+' . $val . '%';
    } elseif ($val < 0) {
        return $val . '%';
    } else {
        return '0%,0';
    }
}

// Numeric values color
function colorVar($value)
{
    if ($value < 0) {
        echo '#F14668';
    } else {
        echo '#00D1B2';
    }
}

// ---------------------------- HELPERS ---------------------------- //

function drawChartTitles()
{
    return <<<HTML
        <div class="columns has-background-white has-text-centered xd-bborder is-mobile">
            <div class="column is-4 is-inline has-text-centered">BUY</div>
            <div class="column is-4 is-inline has-text-centered">SELL</div>
            <div class="column is-4 is-inline has-text-centered">VAR</div>
        </div>
    HTML;
}

function drawChartHeader($imageSrc, $altText, $titleText)
{
    return <<<HTML
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
    HTML;
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