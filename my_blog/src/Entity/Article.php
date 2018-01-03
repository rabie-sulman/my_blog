<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $shortText;
    
    /**
     * @ORM\Column(type="text")
     */
    private $text;

    public function setText(string $text): Article
    {
        $this->text = $text;
        $this->shortText = substr($text, 0, 140);

        return $this;
    }
}
