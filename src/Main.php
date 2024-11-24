<?php

declare(strict_types=1);

namespace Palethia\RaknetExamples{

    require_once './vendor/autoload.php';

    use Laith98Dev\palethia\network\raknet\InternetAddress;
    use Palethia\RaknetExamples\client\Client;
    use Palethia\RaknetExamples\server\Server;

    create_server();
    // create_client();

    function create_server(): void
    {
        $server = new Server(new InternetAddress(InternetAddress::INTERNET_PROTOCOL_VERSION_4, 19132, 4));

        echo "Server Started" . PHP_EOL;
        while (true){ $server->tick(); }
    }

    function create_client(): void
    {
        $client = new Client(
            InternetAddress::random(InternetAddress::INTERNET_PROTOCOL_VERSION_4),
            new InternetAddress("play.arabskills.net", 19132, 4)
        );

        echo "Client created" . PHP_EOL;
        while (true){ $client->tick(); }
    }
}
