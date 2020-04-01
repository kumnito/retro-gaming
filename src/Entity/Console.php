<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConsoleRepository")
 */
class Console
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
     * @ORM\OneToMany(targetEntity="App\Entity\Jeux", mappedBy="console_id", orphanRemoval=true)
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
            $jeu->setConsoleId($this);
        }

        return $this;
    }

    public function removeJeu(Jeux $jeu): self
    {
        if ($this->jeu->contains($jeu)) {
            $this->jeu->removeElement($jeu);
            // set the owning side to null (unless already changed)
            if ($jeu->getConsoleId() === $this) {
                $jeu->setConsoleId(null);
            }
        }

        return $this;
    }

}
