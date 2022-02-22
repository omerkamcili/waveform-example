<?php

namespace App\Converter;

use WaveformGenerator\Channels\ChannelInterface;

/**
 * Class StreamChannel
 * @package App\Converter
 */
class StreamChannel implements ChannelInterface
{
    /**
     * StreamChannel constructor.
     * @param string $channelName
     * @param string $stream
     * @param float $totalSessionTime
     */
    public function __construct(protected string $channelName, protected string $stream, protected float $totalSessionTime)
    {
    }

    /**
     * @return array
     */
    public function getLines(): array
    {
        return explode("\r\n", $this->stream);
    }

    /**
     * @return string
     */
    public function getChannelName(): string
    {
        return $this->channelName;
    }

    /**
     * @return float
     */
    public function getTotalTime(): float
    {
        return $this->totalSessionTime;
    }

}
