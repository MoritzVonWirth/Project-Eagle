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

abstract class ActionController {

    protected $view;

    /**
     * userRepository
     *
     * @var \PHTH\ProjectEagle\Domain\Repository\UserRepository
     * @inject
     */
    protected $userRepository;

    public function __construct()
    {
        $FLUID_CACHE_DIRECTORY = !isset($FLUID_CACHE_DIRECTORY) ? __DIR__ . '/../cache/' : $FLUID_CACHE_DIRECTORY;
        $this->view = new \TYPO3Fluid\Fluid\View\TemplateView();

        $paths = $this->view->getTemplatePaths();
        $paths->setTemplateRootPaths([
            __DIR__ . '/../Resources/Private/Templates/'
        ]);
        $paths->setLayoutRootPaths([
            __DIR__ . '/../Resources/Private/Layouts/'
        ]);
        $paths->setPartialRootPaths([
            __DIR__ . '/../Resources/Private/Partials/'
        ]);
    }

    public function indexAction()
    {

    }
}
