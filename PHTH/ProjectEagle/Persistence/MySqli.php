<?php
namespace PHTH\ProjectEagle\Persistence;
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
class MySqli {

    /**
     * MySql constructor.
     */
    public function __construct()
    {
        $this->establishConnection();
    }

    /**
     *
     */
    private function establishConnection()
    {
        $host = '127.0.0.1';
        $username = 'root';
        $password = '';
        $database = 'project_eagle';

        $conn = new \mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    /**
     * @param $query
     * @return string
     */
    public function executeQuery($query)
    {
        $conn = $this->establishConnection();

        $querySuccessful = false;

        if ($conn->query($query))
        {
            $querySuccessful = true;
        }

        return $querySuccessful;
    }
}