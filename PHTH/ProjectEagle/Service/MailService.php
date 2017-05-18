<?php
namespace PHTH\ProjectEagle\Service;
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

class MailService {

    public static function sendMail() {

        $transport = \Swift_SmtpTransport::newInstance('vwp6834.webpack.hosteurope.de:25',25)
            ->setUsername('wp10624023-testing')
            ->setPassword('P3Tg2DVxS87GHkL');

        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance('Hello Mister Roberto')
            ->setFrom(array('moritz.vonwirth@phth.de' => 'Moritz von Wirth'))
            ->setTo(array('roberto.natale@phth.de' => 'Roberto'))
            ->setBody('Dumdidumdidum');

        $mailer->send($message);
    }
}