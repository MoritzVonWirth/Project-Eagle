<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017
 *  Roberto Natale <roberto.natale@phth.de>, PHTH
 *  Moritz von Wirth <moritz.vonwirth@phth.de>, PHTH
 *
 *  All rights reserved
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURpointOfSaleE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

function autoload($className)
{
    if (substr($className,0,4) === "PHTH") {
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        require_once $fileName;
    }
}
spl_autoload_register('autoload');
