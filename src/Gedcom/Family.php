<?php
/**
 * Genealogy\Gedcom\Family
 *
 * PHP Versions 4 and 5
 *
 * @category Genealogy
 * @package  Genealogy\Gedcom
 * @author   Olivier Vanhoucke <olivier@php.net>
 * @license  http://www.php.net/license/3_01.txt PHP License 3.0.1
 * @version  CVS: $Id: Genealogy_Family.php,v 1.3 2008/09/03 20:35:26 kguest Exp $
 * @link     http://pear.php.net/package/Genealogy_Gedcom
 */

namespace Treii28\GenealogyGedcom\Gedcom;
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
// $Id: Genealogy_Family.php,v 1.3 2008/09/03 20:35:26 kguest Exp $
//

/*
*/

/**
 * Genealogy\Family
 *
 * @category Genealogy
 * @package  Genealogy\Gedcom
 * @author   Olivier Vanhoucke <olivier@php.net>
 * @license  http://www.php.net/license/3_01.txt PHP License 3.0.1
 * @version  Release: @PACKAGE_VERSION@
 * @access   public
 * @link     http://pear.php.net/package/Genealogy_Gedcom
 */
class Family
{

    /**
     * Contains the Gedcom family identifier
     *
     * @var    string
     * @access public
     */
    public $Identifier = '';

    /**
     * Husband
     *
     * @var    string
     * @access public
     */
    public $Husband = '';

    /**
     * Wife
     *
     * @var    string
     * @access public
     */
    public $Wife = '';

    /**
     * Number of child
     *
     * @var    string
     * @access public
     */
    public $ChildNumber = '';

    /**
     * Child
     *
     * @var    array
     * @access public
     */
    public $Child = array();

    /**
     * Marriage
     *
     * @var    array
     * @access public
     */
    public $Marriage = array('Date'    => '',
                          'Time'    => '',
                          'Place'   => '',
                          'Witness' => array(),
                          'Note'    => '',
                          'Source'  => ''
                          );

    /**
     * Divorce
     *
     * @var    array
     * @access public
     */
    public $Divorce = array('Date' => '');

    /**
     * Associates
     *
     * @var    array
     * @access public
     */
    public $Associates = array();

    /**
     * Constructor
     *
     * Creates a new Genealogy\Family Object
     *
     * @param array $arg Array of arguments
     *
     * @access public
     *
     * @return Family
     */
    public function __construct($arg)
    {
        $this->Identifier          = $arg[0];
        $this->Husband             = $arg[1];
        $this->Wife                = $arg[2];
        $this->ChildNumber         = $arg[3];
        $this->Child               = $arg[4];
        $this->Marriage['Date']    = $arg[5];
        $this->Marriage['Time']    = $arg[6];
        $this->Marriage['Place']   = $arg[7];
        $this->Marriage['Witness'] = $arg[8];
        $this->Marriage['Note']    = $arg[9];
        $this->Marriage['Source']  = $arg[10];
        $this->Associates          = $arg[11];
        $this->Divorce['Date']     = $arg[12];
    }
}
?>
