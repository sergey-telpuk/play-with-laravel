<?php

declare(strict_types=1);

namespace App\Http\Controllers\Counter;

use App\Http\Controllers\Controller;
use App\Models\Counter\CounterEntity;
use App\Services\CounterService;
use Facade\FlareClient\Http\Exceptions\BadResponse;
use Safe\DateTimeImmutable;

final class CounterController extends Controller
{

    /**
     * @var CounterService
     */
    private CounterService $counterService;

    public function __construct(CounterService $counterService)
    {
        $this->counterService = $counterService;
    }

    public function indexWithoutMiddleware(): string
    {
        try {
            return $this->counterService->counterAsJson();
        } catch (\Throwable $e) {
            throw new BadResponse();
        }
    }

    public function indexWithMiddleware(): string
    {
        try {
            return $this->counterService->counterAsJson();
        } catch (\Throwable $e) {
            throw new BadResponse();
        }
    }

    public function increment(): array
    {
        try {
            $this->counterService->increment(new DateTimeImmutable('now'));
        } catch (\Throwable $e) {
            throw new BadResponse();
        }

        return ['status' => 'ok'];
    }

    public function decrement(): array
    {
        try {
            $this->counterService->decrement();
        } catch (\Throwable $e) {
            throw new BadResponse();
        }

        return ['status' => 'ok'];
    }
}
