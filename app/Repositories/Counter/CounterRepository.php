<?php

declare(strict_types=1);

namespace App\Repositories\Counter;

use App\Models\Counter\Counter;
use App\Models\Counter\CounterEntity;
use Illuminate\Support\Facades\DB;
use Safe\DateTimeImmutable;

final class CounterRepository implements CounterRepositoryInterface
{
    public function counter(): CounterEntity
    {
        $counter = new CounterEntity();
        $counter->state = $this->amountOfIncrementation();

        return $counter;
    }

    public function increment(DateTimeImmutable $currentTime): void
    {
        $counter = new Counter();
        $counter->setCurrentTime($currentTime);
        $counter->save();
    }

    public function decrement(): void
    {
        DB::table(self::TABLE)
            ->orderBy("created", "DESC")
            ->take(1)
            ->delete();
    }

    private function amountOfIncrementation(): int
    {
        return Counter::all()->count();
    }
}
