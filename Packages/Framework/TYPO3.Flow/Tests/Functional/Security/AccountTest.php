<?php
namespace TYPO3\Flow\Tests\Functional\Security;

/*
 * This file is part of the TYPO3.Flow package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Security\Account;
use TYPO3\Flow\Tests\FunctionalTestCase;

/**
 * Testcase for the account factory
 *
 */
class AccountTest extends FunctionalTestCase
{
    /**
     * @var boolean
     */
    protected $testableSecurityEnabled = true;

    /**
     * @var Account
     */
    protected $account;

    public function setUp()
    {
        parent::setUp();

        $this->account = $this->objectManager->get(Account::class);
    }

    /**
     * @test
     */
    public function freshAccountIsActive()
    {
        $this->account->setExpirationDate(null);
        $this->assertTrue($this->account->isActive());
    }

    /**
     * @test
     */
    public function expiredAccountIsInActive()
    {
        $this->account->setExpirationDate((new \DateTime("now"))->sub(new \DateInterval("PT1H")));
        $this->assertFalse($this->account->isActive());
    }

    /**
     * @test
     */
    public function notYetExpiredAccountIsInActive()
    {
        $this->account->setExpirationDate((new \DateTime("now"))->add(new \DateInterval("PT1H")));
        $this->assertTrue($this->account->isActive());
    }
}
