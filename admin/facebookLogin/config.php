    <?php



// if (!session_id()) {

    session_start();

// }



require_once 'vendor/autoload.php';



$fclient = new \Facebook\Facebook([

    'app_id' => '964802107201645',

    'app_secret' => '65ae0f9a1368762ba34db77e4547da3a',

    'default_graph_version' => 'v2.10'

]);





$helper = $fclient->getRedirectLoginHelper();

if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}


?>