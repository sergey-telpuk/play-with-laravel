<?php

declare(strict_types=1);

namespace App\Models\Counter;

use App\Repositories\Counter\CounterRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Safe\DateTimeImmutable;

final class Counter extends Model
{
    protected $table = CounterRepositoryInterface::TABLE;
    
    public function setCurrentTime(DateTimeImmutable $dateTimeImmutable)
    {
        $this->attributes['created_at'] = $dateTimeImmutable->format(DATE_ISO8601);
    }
}
