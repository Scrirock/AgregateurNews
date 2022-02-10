<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\ORM\Mapping as ORM;

class News {

    private ?int $id;
    private string $site;
    private string $title;
    private string $content;
    private string $author;
    private string $image;

    /**
     * News constructor.
     * @param int|null $id
     * @param string $site
     * @param string $title
     * @param string $content
     * @param string $author
     * @param string $publishDate
     * @param string $image
     */
    public function __construct(?int $id, string $site, string $title, string $content, string $author, string $publishDate, string $image) {
        $this->id = $id;
        $this->site = $site;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->publishDate = $publishDate;
        $this->image = $image;
    }


    public function getId(): ?int {
        return $this->id;
    }

    public function getSite(): ?int {
        return $this->site;
    }

    public function setSite(int $site): self {
        $this->site = $site;

        return $this;
    }

    public function getTitle(): ?string {
        return $this->title;
    }

    public function setTitle(string $title): self {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string {
        return $this->content;
    }

    public function setContent(string $content): self {
        $this->content = $content;

        return $this;
    }

    public function getAuthor(): ?string {
        return $this->author;
    }

    public function setAuthor(string $author): self {
        $this->author = $author;

        return $this;
    }

    public function getImage(): ?string {
        return $this->image;
    }

    public function setImage(string $image): self {
        $this->image = $image;

        return $this;
    }
}
