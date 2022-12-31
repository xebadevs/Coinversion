<?php

// CoinMarketCap PHP settings modified

$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$parameters = [
    'start' => '1',
    'limit' => '50',
    'convert' => 'USD'
];

$headers = [
    'Accepts: application/json',
    'X-CMC_PRO_API_KEY: 5edb431f-494d-4212-8525-e42fbcd5428b'
];
$qs = http_build_query($parameters);    // query string encode the parameters
$request = "{$url}?{$qs}";              // create the request URL


// Get cURL resource
$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => $request,            // set the request URL
    CURLOPT_HTTPHEADER => $headers,     // set the headers
    CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl);           // Send the request, save the response
$data = json_decode($response, true);   // print json decoded response
curl_close($curl);                      // Close request


// ------------------------------OBTAIN VALUES FOR EVERY SELECT CRYPTOCURRENCY ------------------------------ //
for ($i = 0; $i < 50; $i++) {

    if ($data['data'][$i]['symbol'] == 'BTC') {

        $btc_price = substr($data['data'][$i]['quote']['USD']['price'], 0, 9) . '<br>';
        $btc_percent_24h = substr($data['data'][$i]['quote']['USD']['percent_change_24h'], 0, 5) . '<br>';
        $btc_percent_7d = substr($data['data'][$i]['quote']['USD']['percent_change_7d'], 0, 5) . '<br>';
        $btc_percent_30d = substr($data['data'][$i]['quote']['USD']['percent_change_30d'], 0, 5) . '<br>';
    } elseif ($data['data'][$i]['symbol'] == 'ETH') {

        $eth_price = substr($data['data'][$i]['quote']['USD']['price'], 0, 9) . '<br>';
        $eth_percent_24h = substr($data['data'][$i]['quote']['USD']['percent_change_24h'], 0, 5) . '<br>';
        $eth_percent_7d = substr($data['data'][$i]['quote']['USD']['percent_change_7d'], 0, 5) . '<br>';
        $eth_percent_30d = substr($data['data'][$i]['quote']['USD']['percent_change_30d'], 0, 5) . '<br>';
    } elseif ($data['data'][$i]['symbol'] == 'DOT') {

        $dot_price = substr($data['data'][$i]['quote']['USD']['price'], 0, 9) . '<br>';
        $dot_percent_24h = substr($data['data'][$i]['quote']['USD']['percent_change_24h'], 0, 5) . '<br>';
        $dot_percent_7d = substr($data['data'][$i]['quote']['USD']['percent_change_7d'], 0, 5) . '<br>';
        $dot_percent_30d = substr($data['data'][$i]['quote']['USD']['percent_change_30d'], 0, 5) . '<br>';
    } elseif ($data['data'][$i]['symbol'] == 'ADA') {

        $ada_price = substr($data['data'][$i]['quote']['USD']['price'], 0, 9) . '<br>';
        $ada_percent_24h = substr($data['data'][$i]['quote']['USD']['percent_change_24h'], 0, 5) . '<br>';
        $ada_percent_7d = substr($data['data'][$i]['quote']['USD']['percent_change_7d'], 0, 5) . '<br>';
        $ada_percent_30d = substr($data['data'][$i]['quote']['USD']['percent_change_30d'], 0, 5) . '<br>';
    } elseif ($data['data'][$i]['symbol'] == 'LTC') {

        $ltc_price = substr($data['data'][$i]['quote']['USD']['price'], 0, 9) . '<br>';
        $ltc_percent_24h = substr($data['data'][$i]['quote']['USD']['percent_change_24h'], 0, 5) . '<br>';
        $ltc_percent_7d = substr($data['data'][$i]['quote']['USD']['percent_change_7d'], 0, 5) . '<br>';
        $ltc_percent_30d = substr($data['data'][$i]['quote']['USD']['percent_change_30d'], 0, 5) . '<br>';
    }
}

// Return green in positives values and red in the negative ones
function colorData($value)
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
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Cryptocurrency (BTC)</p>
                    </div>
                </div>
            </div>

            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="image column is-3 is-inline has-text-centered">
                    <img class="m-auto xd-crypto" src="./img/btc.png" alt="">
                </div>
                <div class="column is-6 is-inline has-text-centered has-text-weight-bold">Bitcoin</div>
            </div>
        </div>
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Value</p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Day%</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline"><?= $btc_price ?> </p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($btc_percent_24h) ?>"> <?= $btc_percent_24h ?> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Week%</p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Month%</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($btc_percent_7d) ?>"> <?= $btc_percent_7d ?> </p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($btc_percent_30d) ?>"> <?= $btc_percent_30d ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="columns is-centered">
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Cryptocurrency (ETH)</p>
                    </div>
                </div>
            </div>

            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="image column is-3 is-inline has-text-centered">
                    <img class="m-auto xd-crypto" src="./img/eth.png" alt="">
                </div>
                <div class="column is-6 is-inline has-text-centered has-text-weight-bold">Ethereum</div>
            </div>
        </div>
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Value</p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Day%</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline"> <?= $eth_price ?> </p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($eth_percent_24h) ?>"> <?= $eth_percent_24h ?> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Week%</p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Month%</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($eth_percent_7d) ?>"> <?= $eth_percent_7d ?> </p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($eth_percent_30d) ?>"> <?= $eth_percent_30d ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="columns is-centered">
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Cryptocurrency (DOT)</p>
                    </div>
                </div>
            </div>

            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="image column is-3 is-inline has-text-centered">
                    <img class="m-auto xd-crypto" src="./img/dot.png" alt="">
                </div>
                <div class="column is-6 is-inline has-text-centered has-text-weight-bold">Polkadot</div>
            </div>
        </div>
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Value</p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Day%</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline"> <?= $dot_price ?> </p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($dot_percent_24h) ?>"> <?= $dot_percent_24h ?> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary is-mobile">
                <div class="column has-text-centered px-0">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Week%</p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Month%</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($dot_percent_7d) ?>"> <?= $dot_percent_7d ?> </p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($dot_percent_30d) ?>"> <?= $dot_percent_30d ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="columns is-centered">
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Cryptocurrency (ADA)</p>
                    </div>
                </div>
            </div>

            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="image column is-3 is-inline has-text-centered">
                    <img class="m-auto xd-crypto" src="./img/ada.png" alt="">
                </div>
                <div class="column is-6 is-inline has-text-centered has-text-weight-bold">Cardano</div>
            </div>
        </div>
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Value</p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Day%</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline"> <?= $ada_price ?> </p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($ada_percent_24h) ?>"> <?= $ada_percent_24h ?> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Week%</p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Month%</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($ada_percent_7d) ?>"> <?= $ada_percent_7d ?> </p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($ada_percent_30d) ?>"> <?= $ada_percent_30d ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="columns is-centered">
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Cryptocurrency (LTC)</p>
                    </div>
                </div>
            </div>

            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="image column is-3 is-inline has-text-centered">
                    <img class="m-auto xd-crypto" src="./img/ltc.png" alt="">
                </div>
                <div class="column is-6 is-inline has-text-centered has-text-weight-bold">Litecoin</div>
            </div>
        </div>
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Value</p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Day%</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline"> <?= $ltc_price ?> </p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($ltc_percent_24h) ?>"> <?= $ltc_percent_24h ?> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-2 is-3-tablet xd-bshadow">
            <div class="columns has-background-primary is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Week%</p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-white has-text-weight-bold">Month%</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white is-mobile">
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($ltc_percent_7d) ?>"> <?= $ltc_percent_7d ?> </p>
                    </div>
                </div>
                <div class="column has-text-centered">
                    <div>
                        <p class="title is-6 is-inline has-text-weight-bold" style="color: <?php colorData($ltc_percent_30d) ?>"> <?= $ltc_percent_30d ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>