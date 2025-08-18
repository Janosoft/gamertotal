<!-- en_vivo -->
<?php
$url = 'https://id.twitch.tv/oauth2/token';
$client_id = 'f6dhpdn1v5ss2eziaszen00u872sqw'; //ejemplo
$user_login = 'gamertotal_ar';
$access_token = '';

/* GET ACCESS TOKEN */
$data = [
    'client_id' => $client_id,
    'client_secret' => 'knrdksoyiohw6cztat5161fql74e3c', //ejemplo
    'grant_type' => 'client_credentials'
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    $response_data = json_decode($response, true);
    $access_token = $response_data['access_token'];
}
curl_close($ch);
/* GET ACCESS TOKEN */

/* GET TRANSMISION*/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.twitch.tv/helix/streams?user_login=$user_login");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Client-ID: $client_id",
    "Authorization: Bearer $access_token"
    ]);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
// print_r($data);
if (!empty($data['data']))
{
    ?>
    <div class="container">
        <div class="row align-items-center noticias mb-4">
            <div class="col">
                <div class="ratio ratio-16x9">
                    <iframe src="https://player.twitch.tv/?channel=<?php echo $user_login; ?>&parent=www.gamertotal.com.ar" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <?php
}
/* GET TRANSMISION*/
