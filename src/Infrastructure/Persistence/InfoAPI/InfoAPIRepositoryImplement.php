<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\InfoAPI;

use App\Domain\InfoAPI\InfoAPI;
use App\Domain\InfoAPI\InfoAPIHelp;
use App\Domain\InfoAPI\InfoAPIRepository;
use App\Domain\InfoAPI\InfoAPINotFoundException;
use App\Infrastructure\Persistence\BaseRepository;


class InfoAPIRepositoryImplement extends BaseRepository implements InfoAPIRepository
{
    /**
     * @var InfoAPI
     */
    private InfoAPI $infoAPI;

 

    /**
     * {@inheritdoc}
     */
    public function help(): InfoAPIHelp
    {   $this->setInfoAPI();
        return $this->getHelp();  
    }

    /**
     * {@inheritdoc}
     */
    public function status(): array
    {
        if (!isset($this->infoAPIStatus)) {
            throw new InfoAPINotFoundException();
        }

        return $this->infoAPIStatus;
    }

    private function getHelp(): InfoAPIHelp
    {
        $config = $this->getSetting('app');
        $endpoints = [
            'tasks' => $config['domain'] . '/' . 'api'.'/v' . $config['api-version'] . '/users',
            'status' => $config['domain']. '/status',
            'this help' => $config['domain']. '',
        ];
      
        return new InfoAPIHelp($this->infoAPI, $endpoints);
    }

    private function setInfoAPI(): void
    {
        $config = $this->getSetting('app');
        $this->infoAPI =  new InfoAPI($config['api-name'], $config['api-version']);
    }

}