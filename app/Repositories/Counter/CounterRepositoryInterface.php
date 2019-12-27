<?php

declare(strict_types=1);

namespace App\Repositories\Counter;

use App\Models\Counter\CounterEntity;
use Safe\DateTimeImmutable;

interface CounterRepositoryInterface
{
    public const  TABLE = 'counter';

    public function counter(): CounterEntity;

    public function increment(DateTimeImmutable $currentTime): void;

    public function decrement(): void;
}
