<?php


Treii28\GenealogyGedcom\Gedcom;


class Marriage extends Event
{
    public $Witness;
    public function __construct($args=null) {
        parent::__construct($args);
    }
}