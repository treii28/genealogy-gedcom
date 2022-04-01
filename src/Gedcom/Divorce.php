<?php

namespace Treii28\GenealogyGedcom\Gedcom;

use Treii28\GenealogyGedcom\Gedcom\Event;

class Divorce extends Event
{
    public function __construct($args=null) {
        parent::__construct($args);
    }
}