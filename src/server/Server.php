<?php

declare(strict_types=1);

namespace Palethia\RaknetExamples\server;

use Laith98Dev\palethia\network\raknet\InternetAddress;
use Laith98Dev\palethia\network\raknet\RakServer;
use pocketmine\network\mcpe\protocol\ProtocolInfo;

class Server extends RakServer
{
    /**
     * It's not necessary to do a separate class.
     * You can directly create a new instance from RakServer. It depends on what you're doing.
     */
    public function __construct(
        InternetAddress $address
    ){
        parent::__construct($address, new RakServerHandler);

        // You should set the response data, e.g:
        $this->response_data = implode(";", [
            "MCPE",
            "Example Server",
            ProtocolInfo::CURRENT_PROTOCOL,
            ProtocolInfo::MINECRAFT_VERSION_NETWORK,
            0,
            10,
            1938481839478931,
            "Example Server Sub Motd",
            "Creative"
        ]);
    }
}