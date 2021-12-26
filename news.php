<?php

$queryString = http_build_query([
    'api_token' => '58EXiaAuEbLbp7F4XKY4s90uKz6HFXjtwGf4z8u2',
    'symbols' => 'CC:BTC',
    'filter_entities' => 'true',
    'language' => 'en'
]);

$ch = curl_init(sprintf('%s?%s', 'https://api.marketaux.com/v1/news/all', $queryString));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$json = curl_exec($ch);

curl_close($ch);

$apiResult = json_decode($json, true);


echo '<h1> Source: ' . ucfirst($apiResult['data'][0]['source']) . '</h1>';
echo '<h3> Content: ' . $apiResult['data'][0]['description'] . '</h3>';
echo '<h3><a href="' . $apiResult['data'][0]['url'] . '">The link to the New</a></h3>';
echo '<h3> URL: ' . $apiResult['data'][0]['url'] . '</h3>';
echo '<img src="' . $apiResult['data'][0]['image_url'] . '">';
echo '<br>';

$arr = $apiResult['data'][0]['entities'][0]['highlights'];
$arr_length = sizeof($apiResult['data'][0]['entities'][0]['highlights']);
$arr_data = $apiResult['data'][0]['entities'][0]['highlights'];
$news_data_1 = [];

//for($i = 0; $i < ($arr_length - 1); $i++){
//    array_push($news_data_1, $apiResult['data'][0]['entities'][0]['highlights'][$i]['highlight']);
//}

?>

<h3><a href=""></a></h3>

<section class="section">
    <div class="columns is-centered">
        <div class="column is-3 xd-lightshadow has-background-white">
            <div class="columns has-background-info">
                <div class="column has-text-centered">
                    <div class="is-inline">
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold">Daily News</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered xd-nborder is-mobile">
                <div class="content has-text-centered m-4 xd-height">
                    <p class="is-size-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium repudiandae itaque delectus aperiam nihil, repellendus accusamus natus debitis accusantium! Consectetur consequatur magni!</p>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-6 is-inline has-text-centered has-text-info xd-bright"><a href="https://www.dnj.com" target="_blank">Source</a></div>
                <div class="column is-6 is-inline has-text-centered has-text-info"><a href="#">Read Here</a></div>
            </div>
        </div>

        <div class="column is-1"></div>

        <div class="column is-3 xd-lightshadow has-background-white">
            <div class="columns has-background-info">
                <div class="column has-text-centered">
                    <div class="is-inline">
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold">Financial Post</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered xd-nborder is-mobile">
                <div class="content has-text-centered m-4 xd-height">
                    <p class="is-size-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium repudiandae itaque delectus aperiam nihil, repellendus accusamus natus debitis accusantium!</p>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-6 is-inline has-text-centered has-text-info xd-bright"><a href="#" target="_blank">Source</a></div>
                <div class="column is-6 is-inline has-text-centered has-text-info"><a href="#">Read Here</a></div>
            </div>
        </div>

        <div class="column is-1"></div>

        <div class="column is-3 xd-lightshadow has-background-white">
            <div class="columns has-background-info">
                <div class="column has-text-centered">
                    <div class="is-inline">
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold">New York Times</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered xd-nborder is-mobile">
                <div class="content has-text-centered m-4 xd-height">
                    <p class="is-size-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium repudiandae itaque delectus aperiam nihil.</p>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-6 is-inline has-text-centered has-text-info xd-bright"><a href="#" target="_blank">Source</a></div>
                <div class="column is-6 is-inline has-text-centered has-text-info"><a href="#">Read Here</a></div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="columns is-centered">
        <div class="column is-3 xd-lightshadow has-background-white">
            <div class="columns has-background-info">
                <div class="column has-text-centered">
                    <div class="is-inline">
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold">Daily News</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered xd-nborder is-mobile">
                <div class="content has-text-centered m-4 xd-height">
                    <p class="is-size-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium repudiandae itaque delectus aperiam nihil, repellendus accusamus natus debitis accusantium! Consectetur consequatur magni!</p>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-6 is-inline has-text-centered has-text-info xd-bright"><a href="#" target="_blank">Source</a></div>
                <div class="column is-6 is-inline has-text-centered has-text-info"><a href="#">Read Here</a></div>
            </div>
        </div>

        <div class="column is-1"></div>

        <div class="column is-3 xd-lightshadow has-background-white">
            <div class="columns has-background-info">
                <div class="column has-text-centered">
                    <div class="is-inline">
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold">Financial Post</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered xd-nborder is-mobile">
                <div class="content has-text-centered m-4 xd-height">
                    <p class="is-size-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium repudiandae itaque delectus aperiam nihil, repellendus accusamus natus debitis accusantium!</p>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-6 is-inline has-text-centered has-text-info xd-bright"><a href="#" target="_blank">Source</a></div>
                <div class="column is-6 is-inline has-text-centered has-text-info"><a href="#">Read Here</a></div>
            </div>
        </div>

        <div class="column is-1"></div>

        <div class="column is-3 xd-lightshadow has-background-white">
            <div class="columns has-background-info">
                <div class="column has-text-centered">
                    <div class="is-inline">
                        <p class="title is-4 is-inline has-text-white has-text-weight-bold">New York Times</p>
                    </div>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered xd-nborder is-mobile">
                <div class="content has-text-centered m-4 xd-height">
                    <p class="is-size-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium repudiandae itaque delectus aperiam nihil.</p>
                </div>
            </div>
            <div class="columns has-background-white has-text-centered is-mobile">
                <div class="column is-6 is-inline has-text-centered has-text-info xd-bright"><a href="#" target="_blank">Source</a></div>
                <div class="column is-6 is-inline has-text-centered has-text-info"><a href="#">Read Here</a></div>
            </div>
        </div>
    </div>
</section>