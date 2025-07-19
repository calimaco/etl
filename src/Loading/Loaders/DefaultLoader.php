<?php

namespace Src\Loading\Loaders;

use Src\Loading\Loaders\DataLoaderInterface;
use Src\Services\TransformerService;
use Src\Utils\LoadingUtils;

class DefaultLoader implements DataLoaderInterface
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function update(): void
    {
        $transformer = new TransformerService(
            new $this->config['replicado_model'],
            $this->config['query_path']
        );

        LoadingUtils::insertIntoTable(
            $this->config['load_type'],
            $transformer,
            $this->config['model']
        );
    }
}
