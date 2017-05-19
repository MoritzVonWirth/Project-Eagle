<?php
namespace PHTH\ProjectEagle\Domain\Repository;
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

class UserRepository extends \PHTH\ProjectEagle\Domain\Repository\AbstractRepository {

    /**
     * saves a new user
     *
     * @param \PHTH\ProjectEagle\Domain\Model\User $user
     */
    public function saveUser($user)
    {
        $stmt = $this->conn->prepare('INSERT INTO user (
                    user_name, password, first_name, last_name, email
                    ) 
                    VALUES (
                      ?, ?, ?, ?, ?
                    )'
        );

        $stmt->bind_param('sssss', $user->getUserName(), $user->getPassword(), $user->getFirstName(), $user->getLastName(), $user->getEmail());

        $this->conn->executeQuery($stmt);
    }

    /**
     * Searches for equal users
     *
     * @param string $username
     * @return int
     */
    public function findEqualUsername($username)
    {
        $stmt = $this->conn->prepare('SELECT COUNT(id) FROM user WHERE user_name = ?');

        $stmt->bind_param('s', $username);

        $result = $this->executeQuery($stmt);
        return $result;
    }

    /**
     * Searches for equal emails
     *
     * @param string $email
     * @return int
     */
    public function findEqualEmail($email)
    {

        $stmt = $this->conn->prepare('SELECT COUNT(id) FROM user WHERE email = ?');

        $stmt->bind_param('s', $email);

        $result = $this->executeQuery($stmt);
        return $result;
    }
}
