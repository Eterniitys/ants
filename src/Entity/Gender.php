<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenderRepository")
 * @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_USER')"},
 *     collectionOperations={
 *         "post"={"access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Seuls les administrateurs peuvent ajouter des villes."},
 *         "get"={"access_control"="is_granted('ROLE_USER')", "access_control_message"="Vous devez être identifé."}
 *     }
 * )
 */
class Gender
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Species", mappedBy="gender", orphanRemoval=true)
     */
    private $species;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
        $this->species = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Species[]
     */
    public function getSpecies(): Collection
    {
        return $this->species;
    }

    public function addSpecies(Species $species): self
    {
        if (!$this->species->contains($species)) {
            $this->species[] = $species;
            $species->setGender($this);
        }

        return $this;
    }

    public function removeSpecies(Species $species): self
    {
        if ($this->species->contains($species)) {
            $this->species->removeElement($species);
            // set the owning side to null (unless already changed)
            if ($species->getGender() === $this) {
                $species->setGender(null);
            }
        }

        return $this;
    }


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
