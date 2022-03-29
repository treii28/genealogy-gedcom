<?php

namespace Treii28\GenealogyGedcom\Facades;

use Illuminate\Support\Facades\Facade;

class GenealogyGedcom extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'genealogy-gedcom';
    }
}
