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

//$dollarOfficialBuy = showMeTheMoney('https://www.infodolar.com/cotizacion-dolar-oficial.aspx', 'td.colCompraVenta', 0);
//$dollarOfficialSell = showMeTheMoney('https://www.infodolar.com/cotizacion-dolar-oficial.aspx', 'td.colCompraVenta', 1);

$euroVariation = showMeTheVariation('https://www.infodolar.com/cotizacion-euro.aspx', 'td.colVariacion', 0);
$realVariation = showMeTheVariation('https://www.infodolar.com/cotizacion-real.aspx', 'td.colVariacion', 0);
$pesoChileVariation = showMeTheVariation('https://www.infodolar.com/cotizacion-peso-chileno.aspx', 'td.colVariacion', 0);
$pesoUruguayVariation = showMeTheVariation('https://www.infodolar.com/cotizacion-peso-uruguayo.aspx', 'td.colVariacion', 0);



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