<?php

namespace Treii28\GenealogyGedcom;

/**
 * Genealogy\Gedcom
 *
 * PHP Versions 4 and 5
 *
 * @category Genealogy
 * @package  Genealogy\Gedcom
 * @author   Olivier Vanhoucke <olivier@php.net>
 * @license  http://www.php.net/license/3_01.txt PHP License 3.0.1
 * @version  CVS: $Id: Genealogy_Gedcom.php,v 1.4 2008/09/03 22:40:32 kguest Exp $
 * @link     http://pear.php.net/package/Genealogy_Gedcom
 */
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2003 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.02 of the PHP license,      |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Olivier Vanhoucke <olivier@php.net>                         |
// +----------------------------------------------------------------------+
//
// $Id: Genealogy_Gedcom.php,v 1.4 2008/09/03 22:40:32 kguest Exp $
//

use Treii28\GenealogyGedcom\Gedcom\Parser;

/**
 * Genealogy\Gedcom
 *
 * Example:
 *
 *   $ged =& new Genealogy\Gedcom('test.ged');
 *
 *   echo 'Number of individuals : '.  $ged->getNumberOfIndividuals().'<br>';
 *   echo 'Number of families : '.     $ged->getNumberOfFamilies().   '<br>';
 *   echo 'Number of objects :' .      $ged->getNumberOfObjects().    '<br>';
 *   echo 'Last Update :'.             $ged->getLastUpdate().         '<br>';
 *   echo '<br>';
 *
 *   echo '<pre>';
 *   print_r($ged->GedcomIndividualsTreeObjects);
 *   print_r($ged->GedcomFamiliesTreeObjects);
 *   print_r($ged->GedcomObjectsTreeObjects);
 *   print_r($ged->GedcomHeaderTreeObject);
 *   print_r($ged->getIndividual('I1'));
 *   print_r($ged->getFamily('F1'));
 *   print_r($ged->getObject('O1'));
 *   echo '</pre>';
 *
 *   display all firstname and lastname of individuals
 *
 *   foreach ($ged->GedcomIndividualsTreeObjects as $obj) {
 *     echo $obj->Firstname.' '.$obj->Lastname.'<br>';
 *   }
 *
 * Contributors:
 *
 * @category Genealogy
 * @package  Genealogy_Gedcom
 * @author   Olivier Vanhoucke <olivier@php.net>
 * @license  http://www.php.net/license/3_01.txt PHP License 3.0.1
 * @version  Release: @PACKAGE_VERSION@
 * @access   public
 * @link     http://pear.php.net/package/Genealogy_Gedcom
 */
class Gedcom extends Parser
{

    /**
     * Constructor
     *
     * Creates a new Genealogy\Gedcom Object
     *
     * @param string $filename Gedcom filename
     *
     * @access public
     * @return Gedcom the new Genealogy_Gedcom object
     */
    public function __construct($filename)
    {
        parent::__construct($filename);
    }

    /**
     * return the number of individual
     *
     * @access public
     * @return integer
     */
    public function getNumberOfIndividuals()
    {
        return count($this->_GedcomIndividualsTree);
    }

    /**
     * return the number of family
     *
     * @access public
     * @return integer
     */
    public function getNumberOfFamilies()
    {
        return count($this->_GedcomFamiliesTree);
    }

    /**
     * return the number of object
     *
     * @access public
     * @return integer
     */
    public function getNumberOfObjects()
    {
        return count($this->_GedcomObjectsTree);
    }

    /**
     * return the last update
     *
     * @access public
     * @return string
     */
    public function getLastUpdate()
    {
        return $this->GedcomHeaderTreeObject->Date;
    }

    /**
     * Get an Individual (object) from an identifier
     *
     * @param string $identifier Identifier
     *
     * @access public
     * @return mixed object or boolean (error)
     */
    public function getIndividual($identifier)
    {
        foreach ($this->GedcomIndividualsTreeObjects as $obj) {
            if ($obj->Identifier == $identifier) {
                return $obj;
            }
        }
        return false;
    }

    /**
     * Get a family (object) from an identifier
     *
     * @param string $identifier Identifier
     *
     * @access public
     * @return mixed object or false on error.
     */
    public function getFamily($identifier)
    {
        foreach ($this->GedcomFamiliesTreeObjects as $obj) {
            if ($obj->Identifier == $identifier) {
                return $obj;
            }
        }
        return false;
    }

    /**
     * Get an object (object) from an identifier
     *
     * @param string $identifier Identifier
     *
     * @access public
     * @return mixed object or false on error.
     */
    public function getObject($identifier)
    {
        foreach ($this->GedcomObjectsTreeObjects as $obj) {
            if ($obj->Identifier == $identifier) {
                return $obj;
            }
        }
        return false;
    }

    /**
     * test if an individual exists
     *
     * @param string $identifier Identifier
     *
     * @access public
     * @return boolean
     */
    public function isIndividual($identifier)
    {
        foreach ($this->GedcomIndividualsTreeObjects as $obj) {
            if ($obj->Identifier == $identifier) {
                return true;
            }
        }
        return false;
    }

    /**
     * test if a family exists
     *
     * @param string $identifier Identifier
     *
     * @access public
     * @return boolean
     */
    public function isFamily($identifier)
    {
        foreach ($this->GedcomFamiliesTreeObjects as $obj) {
            if ($obj->Identifier == $identifier) {
                return true;
            }
        }
        return false;
    }

    /**
     * test if an object exists
     *
     * @param string $identifier Identifier
     *
     * @access public
     * @return boolean
     */
    public function isObject($identifier)
    {
        foreach ($this->GedcomObjectsTreeObjects as $obj) {
            if ($obj->Identifier == $identifier) {
                return true;
            }
        }
        return false;
    }

    public static function isAssoc($arr)
    {
        if(!is_array($arr)) return false;
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}
?>
