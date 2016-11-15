<?php
/**
 * This file is part of the rainflute/confluencePHPClient.
 *
 * (c) Yuxiao (Shawn) Tan <yuxiaota@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rainflute\ConfluenceClient\Tests\Entity;

use Rainflute\ConfluenceClient\Tests\TestCase;
use Rainflute\ConfluenceClient\Entity\ConfluencePage;

/**
 * Class ConfluencePageModelTest
 * @author  Yuxiao Tan <yuxiaota@gmail.com>
 */
class ConfluencePageTest extends TestCase
{
    public function testGetSpace(){
        $this->assertClassHasAttribute('space',ConfluencePage::class);
    }
}