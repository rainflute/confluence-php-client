<?php
/**
 * This file is part of the rainflute/confluencePHPClient.
 *
 * (c) Yuxiao (Shawn) Tan <yuxiaota@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rainflute\ConfluenceClient;

use Rainflute\ConfluenceClient\Entity\ConfluencePage;

class Client
{
    /**
     * @var Curl
     */
    private $curl;

    /**
     * Class constructor
     * @param Curl $curl
     */
    public function __construct(Curl $curl)
    {
        $this->curl = $curl;
    }

    /**
     * Create new page
     *
     * @param ConfluencePage $page
     * @return mixed
     * @throws \Exception
     */
    public function createPage($page)
    {
        $data = [
            'type' => $page->getType(),
            'title' => $page->getTitle(),
            'ancestors' => $page->getAncestors(),
            'space' => ['key'=>$page->getSpace()],
            'history' => [
                'createdDate' => $page->getCreatedDate()
                    ? $page->getCreatedDate()
                    : date('Y-m-d\TH:i:s.uP', strtotime('now'))
            ],
            'body' => [
                'storage'=>[
                    "value"=>$page->getContent(),
                    "representation"=>"storage",
                ],
            ],
        ];

        return $this->request('GET',$this->curl->getHost()."/content",$data);
    }


    /**
     * Update an existing page
     *
     * @param ConfluencePage $page
     * @return mixed
     * @throws \Exception
     */
    public function updatePage($page)
    {
        $data = [
            'id' => $page->getId(),
            'type' => $page->getType(),
            'title' => $page->getTitle(),
            'space' => ['key'=>$page->getSpace()],
            'body' => [
                'storage'=>[
                    "value"=>$page->getContent(),
                    "representation"=>"storage",
                ],
            ],
            "version"=>["number"=>$page->getVersion()]
        ];

        return $this->request('POST',$this->curl->getHost()."/content/{$page->getId()}",$data);
    }

    /**
     * Delete a page
     *
     * @param $id
     * @return null
     * @throws \Exception
     */
    public function deletePage($id)
    {
        return $this->request('DELETE',$this->curl->getHost()."/content/$id");
    }

    /**
     * Search page by title, space key, type or id
     * @param $parameters
     * @return int
     * @throws \Exception
     */
    public function selectPageBy($parameters){
        if(!is_array($parameters)) throw new \Exception('Invalid argument');
        $url = $this->curl->getHost()."/content?";
        if(isset($parameters['title'])){
            $url = $url."title={$parameters['title']}&";
        }
        if(isset($parameters['spaceKey'])){
            $url = $url."spaceKey={$parameters['spaceKey']}&";
        }
        if(isset($parameters['type'])){
            $url = $url."type={$parameters['type']}&";
        }
        if(isset($parameters['id'])){
            $url = $this->curl->getHost()."/content/".$parameters['id']."?";
        }
        if(isset($parameters['expand'])){
            $url = $url."expand=".$parameters['expand'];
        }

        return $this->request('GET',$url);
    }

    /**
     * Upload an attachment
     * @param $path
     * @param $parentPageId
     * @return string
     * @throws \Exception
     */
    public function uploadAttachment($path,$parentPageId){
        $headers = [
            'Content-Type' => 'multipart/form-data',
            'X-Atlassian-Token' => 'no-check'
        ];
        $data = [
            'file' => '@' . $path
        ];
        return $this->request(
            'POST',
            $this->curl->getHost()."/content/$parentPageId/child/attachment",
            $data,
            $headers
        );
    }

    /**
     * Get attachments from the page
     *
     * @param $pageId
     * @return string
     * @throws \Exception
     */
    public function selectAttachments($pageId)
    {
        return $this->request('GET',$this->curl->getHost()."/content/$pageId/child/attachment");
    }

    /**
     * @param string $pageId
     * @param array $labels [['name'=>'example_tag'],...]
     * @return string
     * @throws \Exception
     */
    public function addLabel($pageId,$labels){
        return $this->request('POST',$this->curl->getHost()."/content/$pageId/label",$labels);
    }

    /**
     * Make request.
     *
     * @param $method
     * @param $url
     * @param array  $data
     * @param array $headers
     *
     * @return int
     *
     * @throws \Exception
     */
    public function request($method, $url, $data = [], $headers = ['Content-Type' => 'application/json'])
    {
        //Detect invalid method
        $method = strtolower($method);
        $methods = ['delete','get','post','put'];
        if (!in_array($method, $methods)) {
            throw new \Exception('Invalid method');
        }
        $this->curl->setOptions([
            CURLOPT_URL=>$url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CUSTOMREQUEST => strtoupper($method),
        ])->setHeaders($headers);

        if($data !== []){
            $this->curl->setOption(CURLOPT_POSTFIELDS, $data);
        }

        $serverOutput = $this->curl->execute();
        $this->curl->close();

        if (!$serverOutput) {
            throw new \Exception('Error: "' . $this->curl->getError() . '" - Code: ' . $this->curl->getErrorNumber());
        }
        else {
            return json_encode($serverOutput);
        }
    }
}