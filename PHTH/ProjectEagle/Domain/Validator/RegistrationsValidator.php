<?php
namespace PHTH\ProjectEagle\Domain\Validator;
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
Class RegistrationsValidator {

    /**
     * @param \PHTH\ProjectEagle\Domain\Model\User $user
     * @return bool
     */
    public static function checkIfInputFieldsAreNotEmpty($user) {

        $valid = true;

        if ($user->getUserName() == ''){
            $user->setUserNameIsValid(0);
            $valid = false;
        }

        if ($user->getPassword() == ''){
            $user->setPasswordIsValid(0);
            $valid = false;
        }

        if ($user->getFirstName() == ''){
            $user->setFirstNameIsValid(0);
            $valid = false;
        }

        if ($user->getLastName() == ''){
            $user->setLastNameIsValid(0);
            $valid = false;
        }

        if ($user->getEmail() == ''){
            $user->setEmailIsValid(0);
            $valid = false;
        }

        return $valid;
    }

    /**
     * @param \PHTH\ProjectEagle\Domain\Model\User $user
     * @return bool
     */
    public static function checkIfInputFieldsAreAlphabetic($user) {

        $valid = true;

        if (!is_string($user->getUserName()) || preg_match('/^[\pL\d]*$/u', $user->getUserName()) !== 1) {
            $user->setUserNameIsValid(0);
            $valid = false;
        }

        if (!is_string($user->getFirstName()) || preg_match('/^[\pL\d]*$/u', $user->getFirstName()) !== 1 || preg_match('([0-9])', $user->getFirstName()) == 1) {
            $user->setFirstNameIsValid(0);
            $valid = false;
        }

        if (!is_string($user->getLastName()) || preg_match('/^[\pL\d]*$/u', $user->getLastName()) !== 1 || preg_match('([0-9])', $user->getLastName()) == 1) {
            $user->setLastNameIsValid(0);
            $valid = false;
        }

        return $valid;
    }

    /**
     * @param \PHTH\ProjectEagle\Domain\Model\User $user
     * @return bool
     */
    public static function checkIfEmailIsValid($user) {

        $valid = true;

        $validator = new \PHTH\ProjectEagle\Domain\Validator\RegistrationsValidator();

        if (!is_string($user->getEmail())  || !$validator->validEmail($user->getEmail())){
            $user->setEmailIsValid(0);
            $valid = false;
        }

        return $valid;
    }

    /**
     * Checking syntax of input email address
     *
     * @param string $email Input string to evaluate
     * @return bool Returns TRUE if the $email (input string) is valid
     */
    protected function validEmail($email) {
        if (!is_string($email)) {
            return false;
        }
        $atPosition = strrpos($email, '@');
        if (!$atPosition || $atPosition + 1 === strlen($email)) {
            return false;
        }
        $domain = substr($email, $atPosition + 1);
        $user = substr($email, 0, $atPosition);

        return filter_var($user . '@' . $domain, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * @param \PHTH\ProjectEagle\Domain\Model\User $user
     * @return bool
     */
    public static function checkIfEnteredPasswordsAreEven($user) {

        $valid = true;

        if ($user->getPassword() !=  $user->getRepeatedPassword()){
            $user->setPasswordIsValid(0);
            $valid = false;
        }

        return $valid;
    }


}