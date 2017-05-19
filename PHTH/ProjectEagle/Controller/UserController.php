<?php
namespace PHTH\ProjectEagle\Controller;
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

class UserController extends \PHTH\ProjectEagle\Controller\ActionController {

    public function __construct()
    {
        parent::__construct();
    }

    public function showAction()
    {
        $string =  "Hallo Welt";

        $this->view->getTemplatePaths()->setTemplatePathAndFilename(__DIR__ . '/../Resources/Private/Templates/User/Show.html');

        $this->view->assign('test', $string);

        $content = $this->view->render();
        return $content;
    }

    public function registerAction(\PHTH\ProjectEagle\Domain\Model\User $user = NULL)
    {
        $this->view->getTemplatePaths()->setTemplatePathAndFilename(__DIR__ . '/../Resources/Private/Templates/User/Register.html');

        $this->view->assign('user', $user);

        $content = $this->view->render();

        return $content;
    }

    public function updateAction()
    {
        $user = new \PHTH\ProjectEagle\Domain\Model\User();

        $user->setUserName($_POST['userName']);
        $user->setPassword($_POST['password']);
        $user->setRepeatedPassword($_POST['repeatedPassword']);
        $user->setFirstName($_POST['firstName']);
        $user->setLastName($_POST['lastName']);
        $user->setEmail($_POST['email']);

        $checkIfInputFieldsAreNotEmpty = \PHTH\ProjectEagle\Domain\Validator\RegistrationsValidator::checkIfInputFieldsAreNotEmpty($user);
        $checkIfInputFieldsAreAlphabetic = \PHTH\ProjectEagle\Domain\Validator\RegistrationsValidator::checkIfInputFieldsAreAlphabetic($user);
        $checkIfPasswordIsValid = \PHTH\ProjectEagle\Domain\Validator\RegistrationsValidator::checkIfEnteredPasswordsAreEven($user);
        $checkIfEMailIsValid = \PHTH\ProjectEagle\Domain\Validator\RegistrationsValidator::checkIfEmailIsValid($user);
        $checkIfThereIsOneUsernameEqual = \PHTH\ProjectEagle\Domain\Validator\RegistrationsValidator::checkIfThereIsOneUsernameEqual($user);
        $checkIfThereIsOneEmailEqual = \PHTH\ProjectEagle\Domain\Validator\RegistrationsValidator::checkIfThereIsOneEmailEqual($user);

        if ($checkIfInputFieldsAreNotEmpty == false || $checkIfInputFieldsAreAlphabetic == false || $checkIfEMailIsValid == false  || $checkIfPasswordIsValid == false || $checkIfThereIsOneUsernameEqual == false || $checkIfThereIsOneEmailEqual == false) {
            return $this->registerAction($user);
        } else {
            $this->userRepository->saveUser($user);
        }

    }

    public function confirmationAction(\PHTH\ProjectEagle\Domain\Model\User $user)
    {
        \PHTH\ProjectEagle\Service\MailService::sendMail();

        $this->view->getTemplatePaths()->setTemplatePathAndFilename(__DIR__ . '/../Resources/Private/Templates/User/Confirmation.html');

        $this->view->assign('user', $user);

        $content = $this->view->render();

        return $content;
    }

}
