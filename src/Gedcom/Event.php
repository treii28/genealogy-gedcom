<?php


namespace Treii28\GenealogyGedcom\Gedcom;

use Treii28\GenealogyGedcom\Gedcom;

class Event
{
    public $Date;
    public $Time;
    public $Place;
    public $Note;
    public $Source;

    public function __construct($args=null) {
        if(is_array($args))
            $this->fromArray($args);
    }

    public function fromArray($args) {
        if(!is_array($args))
            throw new GedcomException("input is not an array");
        if(Gedcom::isAssoc($args))
            return $this->fromAssoc($args);
        $props = array_keys(get_object_vars($this));
        if(count($args) > count($props))
            throw new GedcomException("invalid input");
        foreach($args as $i => $v) {
            $props[$i] = $v;
        }
    }
    public function fromAssoc($args) {
        if(!Gedcom::isAssoc($args))
            throw new GedcomException("input is not an associative array");
        foreach($args as $k => $v) {
            if(property_exists(self::class, $k))
                $this->$k = $v;
            else
                throw new GedcomException("invalid property: '".$k."'");
        }
    }
}