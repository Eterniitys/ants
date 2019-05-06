<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_USER')"},
 *     collectionOperations={
 *         "post"={"access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Seuls les administrateurs peuvent ajouter des villes."},
 *         "get"={"access_control"="is_granted('ROLE_USER')", "access_control_message"="Vous devez être identifé."}
 *     }
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BreedingSheet", mappedBy="user")
     */
    private $breedingSheets;

    public function __construct($name)
    {
        $this->username = $name;
        $this->breedingSheets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection|BreedingSheet[]
     */
    public function getBreedingSheets(): Collection
    {
        return $this->breedingSheets;
    }

    public function addBreedingSheet(BreedingSheet $breedingSheet): self
    {
        if (!$this->breedingSheets->contains($breedingSheet)) {
            $this->breedingSheets[] = $breedingSheet;
            $breedingSheet->setUser($this);
        }

        return $this;
    }

    public function removeBreedingSheet(BreedingSheet $breedingSheet): self
    {
        if ($this->breedingSheets->contains($breedingSheet)) {
            $this->breedingSheets->removeElement($breedingSheet);
            // set the owning side to null (unless already changed)
            if ($breedingSheet->getUser() === $this) {
                $breedingSheet->setUser(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getUsername();
    }
}
