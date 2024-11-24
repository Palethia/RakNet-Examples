<?php

declare(strict_types=1);

namespace Palethia\RaknetExamples\client;

use Laith98Dev\palethia\network\raknet\InternetAddress;
use Laith98Dev\palethia\network\raknet\RakClient;

class Client extends RakClient
{
    /**
     * It's not necessary to do a separate class.
     * You can directly create a new instance from RakServer. It depends on what you're doing.
     */
    public function __construct(
        InternetAddress $client_address,
        InternetAddress $server_address, // target server you want to join
    ){
        parent::__construct($client_address, $server_address, new RakClientHandler);
    }
}