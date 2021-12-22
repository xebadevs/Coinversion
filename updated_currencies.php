<?php

// ---------------------------------------- SIMPLE HTML DOM LIBRARY ---------------------------------------- //

include('simple_html_dom.php');


// ---------------------------------------- VARIABLES ---------------------------------------- //

$pesoChileVariation = showMeTheVariation('https://www.infodolar.com/cotizacion-peso-chileno.aspx', 'td.colVariacion', 0);

//$dollar_off_buy = '';
//$dollar_off_sell = '';
//$euro_buy = '';
//$euro_sell = '';
//$real_buy = '';
//$real_sell = '';
//$peso_uruguay_buy = '';
//$peso_uruguay_sell = '';
//$peso_chile_buy = '';
//$peso_chile_sell = '';

//$dollar_off_buy = matchVarCotization(0, 0, 1);
//$dollar_off_sell = matchVarCotization(0, 2, 3);
//$euro_buy = matchVarCotization(0, 6, 7);
//$euro_sell = matchVarCotization(0, 8, 9);
//$real_buy = matchVarCotization(0, 12, 13);
//$real_sell = matchVarCotization(0, 14, 15);
//$peso_uruguay_buy = matchVarCotization(0, 24, 25);
//$peso_uruguay_sell = matchVarCotization(0, 26, 27);
//$peso_chile_buy = matchVarCotization(0, 30, 31);
//$peso_chile_sell = matchVarCotization(0, 32, 33);

$cot_url = 'https://www.dolarsi.com/api/api.php?type=cotizador';
$context = stream_context_create(array('http' => array('header'=>'Connection: close\r\n')));
$cot_html = file_get_contents($cot_url, false, $context);
preg_match_all('!\d+!', $cot_html, $matches);
$dollar_off_buy = $matches[0][0] . ',' . $matches[0][1];
$dollar_off_sell = $matches[0][2] . ',' . $matches[0][3];
$euro_buy = $matches[0][6] . ',' . $matches[0][7];
$euro_sell = $matches[0][8] . ',' . $matches[0][9];
$real_buy = $matches[0][12] . ',' . $matches[0][13];
$real_sell = $matches[0][14] . ',' . $matches[0][15];
$peso_uruguay_buy = $matches[0][24] . ',' . $matches[0][25];
$peso_uruguay_sell = $matches[0][26] . ',' . $matches[0][27];
$peso_chile_buy = $matches[0][30] . ',' . $matches[0][31];
$peso_chile_sell = $matches[0][32] . ',' . $matches[0][33];


echo $dollar_off_buy;
echo '<br>';
echo $dollar_off_sell;
echo '<br>';
echo $euro_buy;
echo '<br>';
echo $euro_sell;
echo '<br>';
echo $real_buy;
echo '<br>';
echo $real_sell;
echo '<br>';
echo $peso_uruguay_buy;
echo '<br>';
echo $peso_uruguay_sell;
echo '<br>';
echo $peso_chile_buy;
echo '<br>';
echo $peso_chile_sell;

// '/valoresprincipales': JSON FILE FROM 'DOLARSI.COM'
//$dollar_blue_buy = matchVarMainValues(0, 8, 9);
//$dollar_blue_sell = matchVarMainValues(0, 10, 11);

$mv_url = 'https://www.dolarsi.com/api/api.php?type=valoresprincipales';
$mv_html = file_get_contents($mv_url, false, $context);
preg_match_all('!\d+!', $mv_html, $matches);
$dollar_blue_buy = $matches[0][8] . ',' . $matches[0][9];
$dollar_blue_sell = $matches[0][10] . ',' . $matches[0][11];

// --------------------------------------------------------------------------- JSON VARIATIONS ---------------------------------------------------------------------------

// The last variable gives the variation number with a positive or negative sign
// EURO
$infobae_euro_url = 'https://api.economico.infobae.com/financial/asset/?ids=EURPES&range=now';
$infobae_euro_html = file_get_contents($infobae_euro_url, false, $context);
$infobae_euro_str = substr($infobae_euro_html, 1, -1);
$infobae_euro_obj = json_decode($infobae_euro_str);

// REAL
$infobae_real_url = 'https://api.economico.infobae.com/financial/asset/?ids=CMPES&range=now';
$infobae_real_html = file_get_contents($infobae_real_url, false, $context);
$infobae_real_str = substr($infobae_real_html, 1, -1);
$infobae_real_obj = json_decode($infobae_real_str);

// PESO URUGUAY
$infobae_pesou_url = 'https://api.economico.infobae.com/financial/asset/?ids=URUPES&range=now';
$infobae_pesou_html = file_get_contents($infobae_pesou_url, false, $context);
$infobae_pesou_str = substr($infobae_pesou_html, 1, -1);
$infobae_pesou_obj = json_decode($infobae_pesou_str);


// ---------------------------------------- FUNCTIONS ---------------------------------------- //

function showMeTheVariation($url, $element, $num): array|string
{
    $html = file_get_html($url);
    $variation = str_replace('=', '', $html->find($element, $num));
    return str_replace(' ', '', $variation);
}

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