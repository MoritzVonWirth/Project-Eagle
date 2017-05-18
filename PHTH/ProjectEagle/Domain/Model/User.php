<?php
namespace PHTH\ProjectEagle\Domain\Model;
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

class User {

    /**
     * Id
     *
     * @var int
     */
    protected $id;

    /**
     * Username
     *
     * @var string
     */
    protected $userName;

    /**
     * Password
     *
     * @var string
     */
    protected $password;

    /**
     * Repeated Password
     *
     * @var string
     */
    protected $repeatedPassword;

    /**
     * Firstname
     *
     * @var string
     */
    protected $firstName;

    /**
     * Lastname
     *
     * @var string
     */
    protected $lastName;

    /**
     * Lastname
     *
     * @var string
     */
    protected $email;

    /**
     * IBAN
     *
     * @var string
     */
    protected $iban;

    /**
     * userName is valid
     *
     * @var bool
     */
    protected $userNameIsValid;

    /**
     * password is valid
     *
     * @var bool
     */
    protected $passwordIsValid;

    /**
     * firstName is valid
     *
     * @var bool
     */
    protected $firstNameIsValid;

    /**
     * lastName is valid
     *
     * @var bool
     */
    protected $lastNameIsValid;

    /**
     * email is valid
     *
     * @var bool
     */
    protected $emailIsValid;

    /**
     * iban is valid
     *
     * @var bool
     */
    protected $ibanIsValid;

    /**
     * Returns the id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the id
     *
     * @param int $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns the username
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Sets the username
     *
     * @param string $userName
     * @return void
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * Returns the password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the password
     *
     * @param string $password
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Returns the firstname
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Sets the firstname
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Returns the lastname
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Sets the lastname
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Returns the email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the IBAN
     *
     * @return string
     */
    public function getIBAN()
    {
        return $this->iban;
    }

    /**
     * Sets the IBAN
     *
     * @param string $iban
     * @return void
     */
    public function setIBAN($iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return string
     */
    public function getRepeatedPassword()
    {
        return $this->repeatedPassword;
    }

    /**
     * Sets the repeated password
     *
     * @param string $repeatedPassword
     */
    public function setRepeatedPassword($repeatedPassword)
    {
        $this->repeatedPassword = $repeatedPassword;
    }

    public function hashPassword() {

    }

    /**
     * Returns if the userName is valid
     *
     * @return bool
     */
    public function isUserNameIsValid()
    {
        return $this->userNameIsValid;
    }

    /**
     * Sets if the userName is valid
     *
     * @param bool $userNameIsValid
     * @return void
     */
    public function setUserNameIsValid($userNameIsValid)
    {
        $this->userNameIsValid = $userNameIsValid;
    }

    /**
     * Returns if the password is valid
     *
     * @return bool
     */
    public function isPasswordIsValid()
    {
        return $this->passwordIsValid;
    }

    /**
     * Sets if the password is valid
     *
     * @param bool $passwordIsValid
     * @return void
     */
    public function setPasswordIsValid($passwordIsValid)
    {
        $this->passwordIsValid = $passwordIsValid;
    }

    /**
     * Returns if the firstname is valid
     *
     * @return bool
     */
    public function isFirstNameIsValid()
    {
        return $this->firstNameIsValid;
    }

    /**
     * Sets if the firstName is valid
     *
     * @param bool $firstNameIsValid
     * @return void
     */
    public function setFirstNameIsValid($firstNameIsValid)
    {
        $this->firstNameIsValid = $firstNameIsValid;
    }

    /**
     * Returns if the lastName is valid
     *
     * @return bool
     */
    public function isLastNameIsValid()
    {
        return $this->lastNameIsValid;
    }

    /**
     * Sets if the lastName is valid
     *
     * @param bool $lastNameIsValid
     * @return void
     */
    public function setLastNameIsValid($lastNameIsValid)
    {
        $this->lastNameIsValid = $lastNameIsValid;
    }

    /**
     * Returns if the email is valid
     *
     * @return bool
     */
    public function isEmailIsValid()
    {
        return $this->emailIsValid;
    }

    /**
     * Sets if the email is valid
     *
     * @param bool $emailIsValid
     * @return void
     */
    public function setEmailIsValid($emailIsValid)
    {
        $this->emailIsValid = $emailIsValid;
    }

    /**
     * Returns if the iban is valid
     *
     * @return bool
     */
    public function isIBANIsValid()
    {
        return $this->ibanIsValid;
    }

    /**
     * Sets if the iban is valid
     *
     * @param bool $ibanIsValid
     * @return void
     */
    public function setIBANIsValid($ibanIsValid)
    {
        $this->ibanIsValid = $ibanIsValid;
    }




}
?>