<?php

// CoinMarketCap PHP settings

$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$parameters = [
    'start' => '1',
    'limit' => '1',
    'convert' => 'USD'
];

$headers = [
    'Accepts: application/json',
//   'Accept-Encoding: deflate, gzip',
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
print_r(json_decode($response)); // print json decoded response
curl_close($curl); // Close request

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