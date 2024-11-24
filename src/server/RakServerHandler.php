<?php

declare(strict_types=1);

namespace Palethia\RaknetExamples\server;

use Laith98Dev\palethia\network\raknet\connection\Connection;
use Laith98Dev\palethia\network\raknet\handler\RakNetHandler;
use Laith98Dev\palethia\network\raknet\InternetAddress;
use Laith98Dev\palethia\network\raknet\RakBinaryStream;

class RakServerHandler extends RakNetHandler
{
    public function handleConnection(Connection $connection): void
    {
        echo " -  Connect - " . $connection->address . PHP_EOL;
    }
    
    public function handleDisconnection(InternetAddress $address): void
    {
        echo " -  Disconnect - " . $address . PHP_EOL;
    }

    public function handlePacket(RakBinaryStream $stream, InternetAddress $address): void
    {
        echo "Received Packet Id -> " . $stream->getByte() . " from " . $address . PHP_EOL;
    }
}