<?php

namespace Src\Loading\Loaders;

class LattesLoader implements DataLoaderInterface
{
    protected $transformer;

    public function __construct()
    {
        $this->transformer = new Transformer(new LattesReplicado, 'Lattes/lattes');
    }

    public function update(): void
    {
        putenv('REPLICADO_SYBASE=0');

        $pagination = ['limit' => 200, 'offset' => 0];
        $replace = $this->checkLastLattesExtraction();

        do {
            $data = $this->transformer->transformData($pagination, $replace);
            Lattes::upsert($data, ["numero_cnpq"]);

            $pagination['offset'] += $pagination['limit'];
        } while (!empty($data));

        putenv('REPLICADO_SYBASE=1');
    }

    private function checkLastLattesExtraction()
    {
        $last = Capsule::select("SELECT DATE_SUB(MAX(data_extracao_cv), INTERVAL 1 DAY) AS 'data' FROM lattes")[0]->data;
        return $last ? [
            'replacement' => "AND ((d.dtapcsetc >= '$last') OR (d.dtapcsetc IS NULL))",
            'subject' => '--AND1',
        ] : null;
    }
}
