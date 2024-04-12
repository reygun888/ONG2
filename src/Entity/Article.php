<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $auteur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sousTitre1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sousTitre2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sousTitre3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sousTitre4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sousTitre5 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $paragraphe1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $paragraphe2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $paragraphe3 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $paragraphe4 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $paragraphe5 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $paragraphe6 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $paragraphe7 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $paragraphe8 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $paragraphe9 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $paragraphe10 = null;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(?string $image1): static
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): static
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): static
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getSousTitre1(): ?string
    {
        return $this->sousTitre1;
    }

    public function setSousTitre1(?string $sousTitre1): static
    {
        $this->sousTitre1 = $sousTitre1;

        return $this;
    }

    public function getSousTitre2(): ?string
    {
        return $this->sousTitre2;
    }

    public function setSousTitre2(?string $sousTitre2): static
    {
        $this->sousTitre2 = $sousTitre2;

        return $this;
    }

    public function getSousTitre3(): ?string
    {
        return $this->sousTitre3;
    }

    public function setSousTitre3(?string $sousTitre3): static
    {
        $this->sousTitre3 = $sousTitre3;

        return $this;
    }

    public function getSousTitre4(): ?string
    {
        return $this->sousTitre4;
    }

    public function setSousTitre4(?string $sousTitre4): static
    {
        $this->sousTitre4 = $sousTitre4;

        return $this;
    }

    public function getSousTitre5(): ?string
    {
        return $this->sousTitre5;
    }

    public function setSousTitre5(?string $sousTitre5): static
    {
        $this->sousTitre5 = $sousTitre5;

        return $this;
    }

    public function getParagraphe1(): ?string
    {
        return $this->paragraphe1;
    }

    public function setParagraphe1(?string $paragraphe1): static
    {
        $this->paragraphe1 = $paragraphe1;

        return $this;
    }

    public function getParagraphe2(): ?string
    {
        return $this->paragraphe2;
    }

    public function setParagraphe2(?string $paragraphe2): static
    {
        $this->paragraphe2 = $paragraphe2;

        return $this;
    }

    public function getParagraphe3(): ?string
    {
        return $this->paragraphe3;
    }

    public function setParagraphe3(?string $paragraphe3): static
    {
        $this->paragraphe3 = $paragraphe3;

        return $this;
    }

    public function getParagraphe4(): ?string
    {
        return $this->paragraphe4;
    }

    public function setParagraphe4(?string $paragraphe4): static
    {
        $this->paragraphe4 = $paragraphe4;

        return $this;
    }

    public function getParagraphe5(): ?string
    {
        return $this->paragraphe5;
    }

    public function setParagraphe5(?string $paragraphe5): static
    {
        $this->paragraphe5 = $paragraphe5;

        return $this;
    }

    public function getParagraphe6(): ?string
    {
        return $this->paragraphe6;
    }

    public function setParagraphe6(?string $paragraphe6): static
    {
        $this->paragraphe6 = $paragraphe6;

        return $this;
    }

    public function getParagraphe7(): ?string
    {
        return $this->paragraphe7;
    }

    public function setParagraphe7(?string $paragraphe7): static
    {
        $this->paragraphe7 = $paragraphe7;

        return $this;
    }

    public function getParagraphe8(): ?string
    {
        return $this->paragraphe8;
    }

    public function setParagraphe8(?string $paragraphe8): static
    {
        $this->paragraphe8 = $paragraphe8;

        return $this;
    }

    public function getParagraphe9(): ?string
    {
        return $this->paragraphe9;
    }

    public function setParagraphe9(?string $paragraphe9): static
    {
        $this->paragraphe9 = $paragraphe9;

        return $this;
    }

    public function getParagraphe10(): ?string
    {
        return $this->paragraphe10;
    }

    public function setParagraphe10(?string $paragraphe10): static
    {
        $this->paragraphe10 = $paragraphe10;

        return $this;
    }

   
   
    
}
