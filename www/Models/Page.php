<?php
namespace App\Models;
use App\Core\DB;
class Page extends DB
{
    private ?int $id = null;
    protected string $title;
    protected string $content;
    protected string $slug;
    protected string $template;
    protected ?int $user_id;
    protected string $created;
    protected ?string $updated;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function gettitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function settitle(string $title): void
    {
        $login = $title;
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

        /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = "/".str_replace("/","",strtolower(trim($slug))) ;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @param string $template
     */
    public function setTemplate(string $template): void
    {
        
        $this->template = $template;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * @param date created
     */
    public function setCreated(string $time): void
    {
        $this->created = $time;
    }

}