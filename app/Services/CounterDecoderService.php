<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Counter\CounterEntity;

use function Safe\json_encode;

final class CounterDecoderService
{

    public function encodeToJSON(CounterEntity $entity): string
    {
        return
            json_encode(
                new  class($entity) implements \JsonSerializable {
                    /**
                     * @var CounterEntity
                     */
                    private CounterEntity $entity;

                    public function __construct(CounterEntity $entity)
                    {
                        $this->entity = $entity;
                    }

                    public function jsonSerialize()
                    {
                        return ["state" => $this->entity->state];
                    }
                }
            );
    }

    public function decodeJSON(string $json): CounterEntity
    {
        //TODO
    }
}
