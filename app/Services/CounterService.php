<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Counter\CounterEntity;
use App\Repositories\Counter\CounterRepositoryInterface;
use Safe\DateTimeImmutable;

final class CounterService
{
    /**
     * @var CounterRepositoryInterface
     */
    private CounterRepositoryInterface $counterRepository;
    /**
     * @var CounterDecoderService
     */
    private CounterDecoderService $decoderService;

    public function __construct(CounterRepositoryInterface $counterRepository, CounterDecoderService $decoderService)
    {
        $this->counterRepository = $counterRepository;
        $this->decoderService = $decoderService;
    }

    public function counterAsJson(): string
    {
        $counter = $this->counterRepository->counter();
        return $this->decoderService->encodeToJSON($counter);
    }

    public function counter(): CounterEntity
    {
        return $this->counterRepository->counter();
    }

    public function increment(DateTimeImmutable $dateTimeImmutable): void
    {
        $this->counterRepository->increment($dateTimeImmutable);
    }

    public function decrement(): void
    {
        $this->counterRepository->decrement();
    }
}
