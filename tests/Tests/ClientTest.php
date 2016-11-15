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
use Rainflute\ConfluenceClient\Curl;
use Rainflute\ConfluenceClient\Entity\ConfluencePage;

/**
 * Class ClientTest
 * @author  Yuxiao Tan <yuxiaota@gmail.com>
 */
class ClientTest extends TestCase
{
    /**
     * Test create page
     */
    public function testCreatePage()
    {
        $url = 'some/url';
        $username = 'username';
        $password = 'password';
        $curl =  $this->getMockBuilder(Curl::class)
            ->setConstructorArgs([$url,$username,$password])
            ->getMock();
        $curl->expects($this->once())
            ->method('setOptions')
            ->willReturnSelf();
        $curl->expects($this->once())
            ->method('execute')
            ->willReturn(['result'=>true]);
        $client = new Client($curl);
        $page = new ConfluencePage();
        $response = $client->createPage($page);

        $this->assertInternalType('string',$response);
        $this->assertEquals('{"result":true}',$response);
    }

    /**
     * Test search page
     */
    public function testSelectBy()
    {
        $url = 'some/url';
        $username = 'username';
        $password = 'password';
        $curl =  $this->getMockBuilder(Curl::class)
            ->setConstructorArgs([$url,$username,$password])
            ->getMock();
        $curl->expects($this->once())
            ->method('setOptions')
            ->willReturnSelf();
        $curl->expects($this->once())
            ->method('execute')
            ->willReturn(['result'=>true]);
        $client = new Client($curl);
        $response = $client->selectPageBy(['title'=>'test']);

        $this->assertInternalType('string',$response);
        $this->assertEquals('{"result":true}',$response);
    }

    /**
     * Test request function
     */
    public function testRequest()
    {
        $url = 'some/url';
        $username = 'username';
        $password = 'password';
        $curl =  $this->getMockBuilder(Curl::class)
            ->setConstructorArgs([$url,$username,$password])
            ->getMock();
        $curl->expects($this->once())
            ->method('setOptions')
            ->willReturnSelf();
        $curl->expects($this->once())
            ->method('setOption')
            ->willReturnSelf();
        $curl->expects($this->once())
            ->method('execute')
            ->willReturn(['result'=>true]);
        $client = new Client($curl);
        $response = $client->request('POST',$url,['id'=>123]);

        $this->assertInternalType('string',$response);
        $this->assertEquals('{"result":true}',$response);
    }

    /**
     * Test the exception when put invalid method
     * @expectedException     \Exception
     * @expectedExceptionMessage Invalid method
     */
    public function testRequestWithInvalidMethod()
    {
        $url = 'some/url';
        $username = 'username';
        $password = 'password';
        $curl =  $this->getMockBuilder(Curl::class)
            ->setConstructorArgs([$url,$username,$password])
            ->getMock();
        $curl->expects($this->any())
            ->method('setOptions')
            ->willReturnSelf();
        $curl->expects($this->any())
            ->method('setOption')
            ->willReturnSelf();
        $curl->expects($this->any())
            ->method('execute')
            ->willReturn(['result'=>true]);
        $client = new Client($curl);
        $client->request('TEST',$url,['id'=>123]);
    }
}