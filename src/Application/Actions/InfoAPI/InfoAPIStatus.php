<?php

declare(strict_types=1);

namespace App\Application\Actions\InfoAPI;

use Psr\Http\Message\ResponseInterface as Response;

class InfoAPIStatus extends InfoAPIAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $dataInfoAPI = $this->infoAPIRepository->status();

        $this->logger->info("InfoAPI status was viewed.");

        return $this->respondWithData($dataInfoAPI);
    }
}
