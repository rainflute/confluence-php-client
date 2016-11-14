<?php
/**
 * Created by PhpStorm.
 * User: ytan
 * Date: 10/27/16
 * Time: 11:38 PM
 */
namespace Rainflute\ConfluenceClient\Model;

class ConfluencePageModel
{
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var string $title
     */
    private $title;
    /**
     * @var string $space
     */
    private $space;
    /**
     * @var array $ancestors
     */
    private $ancestors = array();
    /**
     * @var string $content
     */
    private $content;
    /**
     * @var int $version
     */
    private $version;
    /**
     * @var array $children
     */
    private $children = array();
    /**
     * @var string $url
     */
    private $url;
    /**
     * @var string
     */
    private $type;
    /**
     * @var
     */
    private $createdDate;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return ConfluencePageModel
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return ConfluencePageModel
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return ConfluencePageModel
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpace()
    {
        return $this->space;
    }

    /**
     * @param mixed $space
     * @return ConfluencePageModel
     */
    public function setSpace($space)
    {
        $this->space = $space;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAncestors()
    {
        return $this->ancestors;
    }

    /**
     * @param mixed $ancestors
     * @return ConfluencePageModel
     */
    public function setAncestors($ancestors)
    {
        $this->ancestors = $ancestors;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return ConfluencePageModel
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $version
     * @return ConfluencePageModel
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     * @return ConfluencePageModel
     */
    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return ConfluencePageModel
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param mixed $createdDate
     * @return ConfluencePageModel
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }
}