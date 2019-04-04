<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{

    const Etat = [
        0 => 'En attente',
        1 => 'Brouillon',
        2 => 'Publie'
        ];
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="posts")
     */
    private $auteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="integer")
     */
    private $publie;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="posts")
     */
    private $category;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $commentaires_actifs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag", inversedBy="posts")
     */
    private $tags;

    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->date = new \DateTime();
    }

    public function isAuthor(User $user = null)
    {
        return $user && $user->getUsername() === $this->getAuteur();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteur(): ?User
    {
        return $this->auteur;
    }

    public function setAuteur(?User $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSlug(): ?string
    {
        return ( new Slugify())->slugify($this->titre);
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getPublie(): ?int
    {
        return $this->publie;
    }

    public function setPublie(int $publie): self
    {
        $this->publie = $publie;

        return $this;
    }

    public function getPublieType(): string
    {

        return self::Etat[$this->publie];
    }
    /**
     * @return Collection|Category[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->category->contains($category)) {
            $this->category->removeElement($category);
        }

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCommentairesActifs(): ?bool
    {
        return $this->commentaires_actifs;
    }

    public function setCommentairesActifs(bool $commentaires_actifs): self
    {
        $this->commentaires_actifs = $commentaires_actifs;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
        }

        return $this;
    }
}
