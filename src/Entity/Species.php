<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpeciesRepository")
 * @Vich\Uploadable()
 * @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_USER')"},
 *     collectionOperations={
 *         "post"={"access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Seuls les administrateurs peuvent ajouter des villes."},
 *         "get"={"access_control"="is_granted('ROLE_USER')", "access_control_message"="Vous devez être identifé."}
 *     }
 * )
 */
class Species
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gender", inversedBy="species")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gender;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * Used to keep file during register process
     * @Vich\UploadableField(mapping="specie_image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BreedingSheet", mappedBy="species", orphanRemoval=true)
     */
    private $breedingSheets;

    /**
     * @ORM\Column(type="integer", length=255, nullable=true)
     */
    private $queen_size_min;

    /**
     * @ORM\Column(type="integer", length=255)
     */
    private $workers_size_min;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $swarming;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $queen_size_max;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $workers_size_max;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $petiolDouble;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cocon;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $InsertionCentrale;



    public function __construct($name, $queen_size_min, $queen_size_max, $workers_size_min, $workers_size_max, $petiolDouble ,$cocon ,$InsertionCentrale ,$swarming, $image, $description)
    {
        $this->name = $name;
        $this->queen_size_min = $queen_size_min;
        $this->queen_size_max = $queen_size_max;
        $this->workers_size_min = $workers_size_min;
        $this->workers_size_max = $workers_size_max;
        $this->petiolDouble = $petiolDouble;
        $this->cocon = $cocon;
        $this->InsertionCentrale = $InsertionCentrale;
        $this->swarming = $swarming;
        $this->image = $image;
        $this->description = $description;
        $this->breedingSheets = new ArrayCollection();
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

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
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
            $breedingSheet->setSpecies($this);
        }

        return $this;
    }

    public function removeBreedingSheet(BreedingSheet $breedingSheet): self
    {
        if ($this->breedingSheets->contains($breedingSheet)) {
            $this->breedingSheets->removeElement($breedingSheet);
            // set the owning side to null (unless already changed)
            if ($breedingSheet->getSpecies() === $this) {
                $breedingSheet->setSpecies(null);
            }
        }

        return $this;
    }

    public function getQueenSizeMin(): ?int
    {
        return $this->queen_size_min;
    }

    public function setQueenSizeMin(?int $queen_size_min): self
    {
        $this->queen_size_min = $queen_size_min;

        return $this;
    }

    public function getWorkersSizeMin(): ?int
    {
        return $this->workers_size_min;
    }

    public function setWorkersSizeMin(int $workers_size_min): self
    {
        $this->workers_size_min = $workers_size_min;

        return $this;
    }

    public function getSwarming(): ?string
    {
        return $this->swarming;
    }

    public function setSwarming(string $swarming): self
    {
        $this->swarming = $swarming;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public function getQueenSizeMax(): ?int
    {
        return $this->queen_size_max;
    }

    public function setQueenSizeMax(?int $queen_size_max): self
    {
        $this->queen_size_max = $queen_size_max;

        return $this;
    }

    public function getWorkersSizeMax(): ?int
    {
        return $this->workers_size_max;
    }

    public function setWorkersSizeMax(?int $workers_size_max): self
    {
        $this->workers_size_max = $workers_size_max;

        return $this;
    }

    public function getPetiolDouble(): ?int
    {
        return $this->petiolDouble;
    }

    public function setPetiolDouble(?int $petiolDouble): self
    {
        $this->petiolDouble = $petiolDouble;

        return $this;
    }

    public function getCocon(): ?int
    {
        return $this->cocon;
    }

    public function setCocon(?int $cocon): self
    {
        $this->cocon = $cocon;

        return $this;
    }

    public function getInsertionCentrale(): ?int
    {
        return $this->InsertionCentrale;
    }

    public function setInsertionCentrale(?int $InsertionCentrale): self
    {
        $this->InsertionCentrale = $InsertionCentrale;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /*
    * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile
    */
    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
    }
}
