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
    /**
     * Test get space
     */
    public function testGetSpace(){
        $confluencePage = new ConfluencePage();
        $this->assertAttributeEquals($confluencePage->getSpace(),'space',$confluencePage);
    }

    /**
     * Test set space
     */
    public function testSetSpace(){
        $this->assertClassHasAttribute('space',ConfluencePage::class);
        $confluencePage = new ConfluencePage();
        $confluencePage->setSpace('TEST');
        $this->assertAttributeEquals('TEST','space',$confluencePage);
    }

    /**
     * Test set id
     */
    public function testSetId(){
        $this->assertClassHasAttribute('id',ConfluencePage::class);
        $confluencePage = new ConfluencePage();
        $confluencePage->setId('123');
        $this->assertAttributeEquals('123','id',$confluencePage);
    }

    /**
     * Test get id
     */
    public function testGetId(){
        $this->assertClassHasAttribute('title',ConfluencePage::class);
        $confluencePage = new ConfluencePage();
        $this->assertAttributeEquals($confluencePage->getId(),'id',$confluencePage);
    }

}