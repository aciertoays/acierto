<?php

declare(strict_types=1);

namespace App\Application\Actions\InfoAPI;

use Psr\Http\Message\ResponseInterface as Response;

class InfoAPIInit extends InfoAPIAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $dataInfoAPI = $this->infoAPIRepository->help();

        $this->logger->info("InfoAPI was viewed.");

        return $this->respondWithData($dataInfoAPI);
    }
}
