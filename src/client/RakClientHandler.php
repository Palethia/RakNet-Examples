<?php

declare(strict_types=1);

namespace Palethia\RaknetExamples\client;

use Laith98Dev\palethia\network\raknet\connection\Connection;
use Laith98Dev\palethia\network\raknet\handler\RakNetHandler;
use Laith98Dev\palethia\network\raknet\InternetAddress;
use Laith98Dev\palethia\network\raknet\protocol\packet\datagram\types\Reliability;
use Laith98Dev\palethia\network\raknet\RakBinaryStream;
use pocketmine\network\mcpe\protocol\ProtocolInfo;
use pocketmine\network\mcpe\protocol\RequestNetworkSettingsPacket;
use pocketmine\network\mcpe\protocol\serializer\PacketBatch;
use pocketmine\network\mcpe\protocol\serializer\PacketSerializer;

class RakClientHandler extends RakNetHandler
{
    public function handleConnection(Connection $connection): void
    {
        echo " -  Connected to " . $connection->address . PHP_EOL;

        PacketBatch::encodePackets($ser = PacketSerializer::encoder(), [
            RequestNetworkSettingsPacket::create(ProtocolInfo::CURRENT_PROTOCOL)
        ]);
        
        $connection->sendPacket($ser->getBuffer(), Reliability::RELIABLE_ARRANGED);

        // TODO...
    }
    
    public function handleDisconnection(InternetAddress $address): void
    {
        echo " -  Disconnect from " . $address . PHP_EOL;
    }

    public function handlePacket(RakBinaryStream $stream, InternetAddress $address): void
    {
        echo "Received Packet Id -> " . $stream->getByte() . " from " . $address . PHP_EOL;
    }
}