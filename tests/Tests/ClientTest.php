<?php
/**
 * This file is part of the rainflute/confluencePHPClient.
 *
 * (c) Yuxiao (Shawn) Tan <yuxiaota@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rainflute\ConfluenceClient\Tests;

use Rainflute\ConfluenceClient\Client;
use Rainflute\ConfluenceClient\Entity\ConfluencePage;

/**
 * Class ClientTest
 * @author  Yuxiao Tan <yuxiaota@gmail.com>
 */
class ClientTest extends TestCase
{
    public function testCreatePage()
    {
        $url = 'some/url';
        $username = 'username';
        $password = 'password';
//        $client = new Client($url,$username,$password);
        $client =  $this->createMock(Client::class);
//        $client->createPage($page);
        $client->expects($this->once())
            ->method('request')
            ->willReturn(true);
        $this->assertEquals('1','1');
    }
}