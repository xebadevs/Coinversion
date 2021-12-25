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
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => $request,            // set the request URL
    CURLOPT_HTTPHEADER => $headers,     // set the headers
    CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response
$data = json_decode($response, true); // print json decoded response
curl_close($curl); // Close request

// ------------------------------OBTAIN VALUES FOR EVERY SELECT CRYPTOCURRENCY ------------------------------ //
for($i = 0; $i < 50; $i++){
    if($data['data'][$i]['symbol'] == 'BTC'){
        $first_symbol = $data['data'][$i]['symbol'] . '<br>';
        $btc_price = $data['data'][$i]['quote']['USD']['price'] . '<br>';
        $btc_percent_24h = $data['data'][$i]['quote']['USD']['percent_change_24h'] . '<br>';
        $btc_percent_7d = $data['data'][$i]['quote']['USD']['percent_change_7d'] . '<br>';
        $btc_percent_30d = $data['data'][$i]['quote']['USD']['percent_change_30d'] . '<br>';
    }elseif($data['data'][$i]['symbol'] == 'ETH'){
        $second_symbol = $data['data'][$i]['symbol'] . '<br>';
        $eth_price = $data['data'][$i]['quote']['USD']['price'] . '<br>';
        $eth_percent_24h = $data['data'][$i]['quote']['USD']['percent_change_24h'] . '<br>';
        $eth_percent_7d = $data['data'][$i]['quote']['USD']['percent_change_7d'] . '<br>';
        $eth_percent_30d = $data['data'][$i]['quote']['USD']['percent_change_30d'] . '<br>';
    }elseif($data['data'][$i]['symbol'] == 'DOT'){
        $third_symbol = $data['data'][$i]['symbol'] . '<br>';
        $dot_price = $data['data'][$i]['quote']['USD']['price'] . '<br>';
        $dot_percent_24h = $data['data'][$i]['quote']['USD']['percent_change_24h'] . '<br>';
        $dot_percent_7d = $data['data'][$i]['quote']['USD']['percent_change_7d'] . '<br>';
        $dot_percent_30d = $data['data'][$i]['quote']['USD']['percent_change_30d'] . '<br>';
    }elseif($data['data'][$i]['symbol'] == 'ADA'){
        $fourth_symbol = $data['data'][$i]['symbol'] . '<br>';
        $ada_price = $data['data'][$i]['quote']['USD']['price'] . '<br>';
        $ada_percent_24h = $data['data'][$i]['quote']['USD']['percent_change_24h'] . '<br>';
        $ada_percent_7d = $data['data'][$i]['quote']['USD']['percent_change_7d'] . '<br>';
        $ada_percent_30d = $data['data'][$i]['quote']['USD']['percent_change_30d'] . '<br>';
    }elseif($data['data'][$i]['symbol'] == 'LTC'){
        $fifth_symbol = $data['data'][$i]['symbol'] . '<br>';
        $ltc_price = $data['data'][$i]['quote']['USD']['price'] . '<br>';
        $ltc_percent_24h = $data['data'][$i]['quote']['USD']['percent_change_24h'] . '<br>';
        $ltc_percent_7d = $data['data'][$i]['quote']['USD']['percent_change_7d'] . '<br>';
        $ltc_percent_30d = $data['data'][$i]['quote']['USD']['percent_change_30d'] . '<br>';
    }
}

echo 'Crypto Name is: ' . $first_symbol;
echo 'BTC Price is: ' . substr($btc_price, 0, 9) . '<br>';
echo 'BTC Percent 24 hours is: ' . substr($btc_percent_24h, 0, 5) . '<br>';
echo 'BTC Percent 7 days is: ' . substr($btc_percent_7d, 0, 5) . '<br>';
echo 'BTC Percent 30 days is: ' . substr($btc_percent_30d, 0, 5) . '<br>';

echo '<hr>';

echo 'Crypto Name is: ' . $second_symbol;
echo 'ETH Price is: ' . substr($eth_price, 0, 9) . '<br>';
echo 'ETH Percent 24 hours is: ' . substr($eth_percent_24h, 0, 5) . '<br>';
echo 'ETH Percent 7 days is: ' . substr($eth_percent_7d, 0, 5) . '<br>';
echo 'ETH Percent 30 days is: ' . substr($eth_percent_30d, 0, 5) . '<br>';

echo '<hr>';

echo 'Crypto Name is: ' . $third_symbol;
echo 'DOT Price is: ' . substr($dot_price, 0, 9) . '<br>';
echo 'DOT Percent 24 hours is: ' . substr($dot_percent_24h, 0, 5) . '<br>';
echo 'DOT Percent 7 days is: ' . substr($dot_percent_7d, 0, 5) . '<br>';
echo 'DOT Percent 30 days is: ' . substr($dot_percent_30d, 0, 5) . '<br>';

echo '<hr>';

echo 'Crypto Name is: ' . $fourth_symbol;
echo 'ADA Price is: ' . substr($ada_price, 0, 9) . '<br>';
echo 'ADA Percent 24 hours is: ' . substr($ada_percent_24h, 0, 5) . '<br>';
echo 'ADA Percent 7 days is: ' . substr($ada_percent_7d, 0, 5) . '<br>';
echo 'ADA Percent 30 days is: ' . substr($ada_percent_30d, 0, 5) . '<br>';

echo '<hr>';

echo 'Crypto Name is: ' . $fifth_symbol;
echo 'LTC Price is: ' . substr($ltc_price, 0, 9) . '<br>';
echo 'LTC Percent 24 hours is: ' . substr($ltc_percent_24h, 0, 5) . '<br>';
echo 'LTC Percent 7 days is: ' . substr($ltc_percent_7d, 0, 5) . '<br>';
echo 'LTC Percent 30 days is: ' . substr($ltc_percent_30d, 0, 5) . '<br>';


?>

<section class="section">
        <div class="columns is-centered">
            <div class="column is-2 xd-bshadow">
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
                    <div class="column is-6 is-inline has-text-centered">Bitcoin</div>
                </div>
            </div>
            <div class="column is-2 xd-bshadow">
                <div class="columns has-background-primary is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Value</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Diary%</p>
                        </div>
                    </div>
                </div>
                <div class="columns has-background-white is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline">50,174.81</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">1.45%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-2 xd-bshadow">
                <div class="columns has-background-primary is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Weekly%</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Monthly%</p>
                        </div>
                    </div>
                </div>
                <div class="columns has-background-white is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">1.66%</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">22.11%</p>
                        </div>
                    </div>
                </div>
            </div>            
        </div>

        <br><br>
        
        <div class="columns is-centered">
            <div class="column is-2 xd-bshadow">
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
                    <div class="column is-6 is-inline has-text-centered">Ethereum</div>
                </div>
            </div>
            <div class="column is-2 xd-bshadow">
                <div class="columns has-background-primary is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Value</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Diary%</p>
                        </div>
                    </div>
                </div>
                <div class="columns has-background-white is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline">50,174.81</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">1.45%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-2 xd-bshadow">
                <div class="columns has-background-primary is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Weekly%</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Monthly%</p>
                        </div>
                    </div>
                </div>
                <div class="columns has-background-white is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">1.66%</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">22.11%</p>
                        </div>
                    </div>
                </div>
            </div>            
        </div>

        <br><br>
        
        <div class="columns is-centered">
            <div class="column is-2 xd-bshadow">
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
                    <div class="column is-6 is-inline has-text-centered">Polkadot</div>
                </div>
            </div>
            <div class="column is-2 xd-bshadow">
                <div class="columns has-background-primary is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Value</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Diary%</p>
                        </div>
                    </div>
                </div>
                <div class="columns has-background-white is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline">50,174.81</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">1.45%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-2 xd-bshadow">
                <div class="columns has-background-primary is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Weekly%</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Monthly%</p>
                        </div>
                    </div>
                </div>
                <div class="columns has-background-white is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">1.66%</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">22.11%</p>
                        </div>
                    </div>
                </div>
            </div>            
        </div>

        <br><br>
        
        <div class="columns is-centered">
            <div class="column is-2 xd-bshadow">
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
                    <div class="column is-6 is-inline has-text-centered">Cardano</div>
                </div>
            </div>
            <div class="column is-2 xd-bshadow">
                <div class="columns has-background-primary is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Value</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Diary%</p>
                        </div>
                    </div>
                </div>
                <div class="columns has-background-white is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline">50,174.81</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">1.45%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-2 xd-bshadow">
                <div class="columns has-background-primary is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Weekly%</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Monthly%</p>
                        </div>
                    </div>
                </div>
                <div class="columns has-background-white is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">1.66%</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">22.11%</p>
                        </div>
                    </div>
                </div>
            </div>            
        </div>

        <br><br>
        
        <div class="columns is-centered">
            <div class="column is-2 xd-bshadow">
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
                    <div class="column is-6 is-inline has-text-centered">Litecoin</div>
                </div>
            </div>
            <div class="column is-2 xd-bshadow">
                <div class="columns has-background-primary is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Value</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Diary%</p>
                        </div>
                    </div>
                </div>
                <div class="columns has-background-white is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline">50,174.81</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">1.45%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-2 xd-bshadow">
                <div class="columns has-background-primary is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Weekly%</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-white has-text-weight-bold">Monthly%</p>
                        </div>
                    </div>
                </div>
                <div class="columns has-background-white is-mobile">
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">1.66%</p>
                        </div>
                    </div>
                    <div class="column has-text-centered">
                        <div>
                            <p class="title is-6 is-inline has-text-weight-bold">22.11%</p>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </section>