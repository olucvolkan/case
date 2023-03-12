<?php

namespace App\Entity;

use App\Repository\HomeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\ArrayShape;

#[ORM\Entity(repositoryClass: HomeRepository::class)]
class Home implements \JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'home', targetEntity: HomeAvailability::class)]
    private Collection $homeAvailabilities;

    public function __construct()
    {
        $this->homeAvailabilities = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, HomeAvailability>
     */
    public function getHomeAvailabilities(): Collection
    {
        return $this->homeAvailabilities;
    }

    public function addHomeAvailability(HomeAvailability $homeAvailability): self
    {
        if (!$this->homeAvailabilities->contains($homeAvailability)) {
            $this->homeAvailabilities->add($homeAvailability);
            $homeAvailability->setHome($this);
        }

        return $this;
    }

    public function removeHomeAvailability(HomeAvailability $homeAvailability): self
    {
        if ($this->homeAvailabilities->removeElement($homeAvailability)) {
            // set the owning side to null (unless already changed)
            if ($homeAvailability->getHome() === $this) {
                $homeAvailability->setHome(null);
            }
        }

        return $this;
    }

    #[ArrayShape(['id' => "int|null", 'name' => "null|string", 'description' => "null|string", 'location' => "null|string", 'address' => "null|string"])] public function jsonSerialize():array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'location' => $this->getLocation(),
            'address' => $this->getAddress(),
        ];
    }
}
