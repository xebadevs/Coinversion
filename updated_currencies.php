<?php


include('simple_html_dom.php');

// $html = file_get_html('https://es.wikihow.com/ajustar-los-graves-en-una-computadora');
// $title = $html->find("div#intro", 0)->innertext;
// echo $title;

$html = file_get_html('https://www.infodolar.com');
$dolarBlueCompra = $html->find("td.colCompraVenta", 0)->innertext;
$dolarBlueVenta = $html->find("td.colCompraVenta", 1)->innertext;
$dolarBlueCompraString = trim($dolarBlueCompra, ' $');
$dolarBlueCompraValue = substr($dolarBlueCompraString, 0, 6);
//echo "Dolar venta: $dolarBlueVenta";
//echo $dolarBlueCompraValue;
$dolarBlueVariation = $html->find("td.colVariacion", 0);
echo $dolarBlueVariation;

function getMoneyValue($url, $element, $int){
    $html = file_get_html($url);
    $currencie = $html->find($element, $int)->innertext;
    $currencieString = trim($currencie, ' $');
    return substr($currencieString, 0, 6);
}

echo 'Dollar(Blue) Buy: ' . getMoneyValue('https://www.infodolar.com', 'td.colCompraVenta', 0);
echo '<br>';
echo 'Dollar(Blue) Sell: ' . getMoneyValue('https://www.infodolar.com', 'td.colCompraVenta', 1);

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
                        <div class="column is-4 is-inline has-text-centered">101.56</div>
                        <div class="column is-4 is-inline has-text-centered">107.56</div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold">0.36%</div>
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
                        <div class="column is-4 is-inline has-text-centered">101.56</div>
                        <div class="column is-4 is-inline has-text-centered">107.56</div>
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold">0.36%</div>
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
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold">0.36%</div>
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
                        <div class="column is-4 is-inline has-text-centered"><?= $dolarBlueCompraValue ?></div>
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
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold">0.36%</div>
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
                        <div class="column is-4 is-inline has-text-centered has-text-weight-bold">0.36%</div>
                    </div>
                </div>
            </div>
    </section>