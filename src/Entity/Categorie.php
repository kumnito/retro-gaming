<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Jeux", mappedBy="categorie", orphanRemoval=true)
     */
    private $jeu;

    public function __construct()
    {
        $this->jeu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Jeux[]
     */
    public function getJeu(): Collection
    {
        return $this->jeu;
    }

    public function addJeu(Jeux $jeu): self
    {
        if (!$this->jeu->contains($jeu)) {
            $this->jeu[] = $jeu;
            $jeu->setCategorie($this);
        }

        return $this;
    }

    public function removeJeu(Jeux $jeu): self
    {
        if ($this->jeu->contains($jeu)) {
            $this->jeu->removeElement($jeu);
            // set the owning side to null (unless already changed)
            if ($jeu->getCategorie() === $this) {
                $jeu->setCategorie(null);
            }
        }

        return $this;
    }
}
