<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once './config/Config.php';

class Route
{
    public function __construct()
    {
    }

    public function Request()
    {
        $request = $_REQUEST['request'];
        $request = str_replace('api/', '', $request);
        $request_method = $_SERVER['REQUEST_METHOD'];

        $options = array(
            'cluster' => '',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '',
            '',
            '',
            $options
        );

        if ($request_method == 'OPTIONS') {
            http_response_code(200);
            return;
        }

        switch ($request_method) {
            case 'POST':
                $request_body = json_decode(file_get_contents('php://input'));

                // echo $request_body->message;
                // return;

                if ($request == 'message') {
                    $pusher->trigger($request_body->channel, 'my-event',  json_encode($request_body));
                    echo json_encode($request_body);
                }
                echo false;
                break;

            case 'GET':
                if ($request == 'message') {
                    echo "Get message";
                }
                break;
        }
    }
}

$route = new Route();
$route->Request();
