<?php


include('simple_html_dom.php');

// $html = file_get_html('https://es.wikihow.com/ajustar-los-graves-en-una-computadora');
// $title = $html->find("div#intro", 0)->innertext;
// echo $title;


function showMeTheMoney($url, $element, $num): string
{
    $html = file_get_html($url);
    $money = $html->find($element, $num)->innertext;
    $moneyString = trim($money, ' $');
    return substr($moneyString, 0, 6);
}

function showMeTheVariation($url, $element, $num): array|string
{
    $html = file_get_html($url);
    $variation = str_replace('=', '', $html->find($element, $num));
    return str_replace(' ', '', $variation);
}
function showMeTheVariJson($url){
    $html = file_get_contents($url);
    $str = substr($html, 1, -1);
    $obj = json_decode($str);
    return $obj->variation;
}

//$dollarOfficialBuy = showMeTheMoney('https://www.infodolar.com/cotizacion-dolar-oficial.aspx', 'td.colCompraVenta', 0);
//$dollarOfficialSell = showMeTheMoney('https://www.infodolar.com/cotizacion-dolar-oficial.aspx', 'td.colCompraVenta', 1);

$euroVariation = showMeTheVariation('https://www.infodolar.com/cotizacion-euro.aspx', 'td.colVariacion', 0);
$realVariation = showMeTheVariation('https://www.infodolar.com/cotizacion-real.aspx', 'td.colVariacion', 0);
$pesoChileVariation = showMeTheVariation('https://www.infodolar.com/cotizacion-peso-chileno.aspx', 'td.colVariacion', 0);
$pesoUruguayVariation = showMeTheVariation('https://www.infodolar.com/cotizacion-peso-uruguayo.aspx', 'td.colVariacion', 0);


// COTIZADOR: JSON FILE FROM 'DOLARSI.COM'
$cotizador_url = 'https://www.dolarsi.com/api/api.php?type=cotizador';
$cotizador_html = file_get_contents($cotizador_url);
$cotizador_num = preg_match_all('!\d+!', $cotizador_html, $matches);

$dollar_off_buy = $matches[0][0] . ',' . $matches[0][1];
echo 'Dollar (Official) Buy: ' . $dollar_off_buy;
echo '<br>';
$dollar_off_sell = $matches[0][2] . ',' . $matches[0][3];
echo 'Dollar (Official) Sell: ' . $dollar_off_sell;
echo '<br>';

$euro_buy = $matches[0][6] . ',' . $matches[0][7];
echo 'Euro Buy: ' . $euro_buy;
echo '<br>';
$euro_sell = $matches[0][8] . ',' . $matches[0][9];
echo 'Euro Sell: ' . $euro_sell;
echo '<br>';

$real_buy = $matches[0][12] . ',' . $matches[0][13];
echo 'Real Buy: ' . $real_buy;
echo '<br>';
$real_sell = $matches[0][14] . ',' . $matches[0][15];
echo 'Real Sell: ' . $real_sell;
echo '<br>';

$peso_uruguay_buy = $matches[0][24] . ',' . $matches[0][25];
echo 'Peso (Uruguay) Buy: ' . $peso_uruguay_buy;
echo '<br>';
$peso_uruguay_sell = $matches[0][26] . ',' . $matches[0][27];
echo 'Peso (Uruguay) Sell: ' . $peso_uruguay_sell;
echo '<br>';

$peso_chile_buy = $matches[0][30] . ',' . $matches[0][31];
echo 'Peso (Chile) Buy: ' . $peso_chile_buy;
echo '<br>';
$peso_chile_sell = $matches[0][32] . ',' . $matches[0][33];
echo 'Peso (Chile) Sell: ' . $peso_chile_sell;
echo '<br>';

function matchVarCotization($arr, $val1, $val2){
    $url = 'https://www.dolarsi.com/api/api.php?type=cotizador';
    $html = file_get_contents($url);
    $arrNum = preg_match_all('!\d+!', $html, $matches);
    $length = strlen((string)$val1);
    $content = $matches[$arr][$val1] . ',' . $matches[$arr][$val2];

    // If the value of 'Valores Principales' from the API is a number without decimals, the index of the array changes for a three-digit number.
    // In order to fix that but preserve the API, that wrong value is equal to '0'.
    if(strlen($matches[$arr][$val1]) > 2){
        return 'Else:' . 0 . ',' . $matches[$arr][$val2];
    }else{
        return $matches[$arr][$val1] . ',' . $matches[$arr][$val2];
    }
}

echo '<br>';
echo '<br>';
echo matchVarCotization(0, 24, 25);
echo '<br>';
echo '<br>';


// --------------------------------------------------------------------------- JSON VARIATIONS ---------------------------------------------------------------------------

// EURO
$infobae_euro_url = 'https://api.economico.infobae.com/financial/asset/?ids=EURPES&range=now';
$infobae_euro_html = file_get_contents($infobae_euro_url);
$infobae_euro_str = substr($infobae_euro_html, 1, -1);
$infobae_euro_obj = json_decode($infobae_euro_str);

echo 'Euro variation: ' . $infobae_euro_obj->variation;
echo '<br>';
echo '<br>';


// REAL
$infobae_real_url = 'https://api.economico.infobae.com/financial/asset/?ids=CMPES&range=now';
$infobae_real_html = file_get_contents($infobae_real_url);
$infobae_real_str = substr($infobae_real_html, 1, -1);
$infobae_real_obj = json_decode($infobae_real_str);

echo 'Real variation: ' . $infobae_real_obj->variation;
echo '<br>';
echo '<br>';

// PESO URUGUAY
$infobae_pesou_url = 'https://api.economico.infobae.com/financial/asset/?ids=URUPES&range=now';
$infobae_pesou_html = file_get_contents($infobae_pesou_url);
$infobae_pesou_str = substr($infobae_pesou_html, 1, -1);
$infobae_pesou_obj = json_decode($infobae_pesou_str);

echo 'Peso (Uruguay) variation: ' . $infobae_pesou_obj->variation;

echo '<br>';
echo '<h1>Variation</h1>';
echo showMeTheVariJson('https://api.economico.infobae.com/financial/asset/?ids=URUPES&range=now');

function matchVarMainValues($arr, $val1, $val2): string
{
    $url = 'https://www.dolarsi.com/api/api.php?type=valoresprincipales';
    $html = file_get_contents($url);
    $arrNum = preg_match_all('!\d+!', $html, $matches);
    $length = strlen((string)$val1);
    $content = $matches[$arr][$val1] . ',' . $matches[$arr][$val2];

    // If the value of 'Valores Principales' from the API is a number without decimals, the index of the array changes for a three-digit number.
    // In order to fix that but preserve the API, that wrong value is equal to '0'.
    if(strlen($matches[$arr][$val1]) > 2){
        return 'Else:' . 0 . ',' . $matches[$arr][$val2];
    }else{
        return $matches[$arr][$val1] . ',' . $matches[$arr][$val2];
    }
}

echo '<br>';
echo '<br>';
echo 'New example: ' . matchVarMainValues(0, 12, 13);


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
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold"><?= $euroVariation?></div>
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
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold"><?= $realVariation?></div>
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
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold"><?= $pesoChileVariation?></div>
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
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold"><?= $pesoUruguayVariation?></div>
                    </div>
                </div>
            </div>
    </section>