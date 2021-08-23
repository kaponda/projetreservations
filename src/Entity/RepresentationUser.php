<?php

namespace App\Entity;

use App\Repository\RepresentationUserRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
/**
 * @ORM\Entity(repositoryClass=RepresentationUserRepository::class)
 * @ORM\Table(name="representationuser")
 */
class RepresentationUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Representation::class, inversedBy="reservation")
	 * @ORM\JoinColumn(nullable=false, name="representation_id", referencedColumnName="id", onDelete="RESTRICT")
     */
    private $representation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservation")
	 * @ORM\JoinColumn(nullable=false, name="user_id", referencedColumnName="id", onDelete="RESTRICT")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $places;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepresentation(): ?Representation
    {
        return $this->representation;
    }

    public function setRepresentation(?Representation $representation): self
    {
        $this->representation = $representation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPlaces(): ?string
    {
        return $this->places;
    }

    public function setPlaces(?string $places): self
    {
        $this->places = $places;

        return $this;
    }
}
