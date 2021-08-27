<?php

namespace App\Entity;

use App\Repository\RepresentationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass=RepresentationRepository::class)
 * @ORM\Table(name="representations")
 */
class Representation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Show::class, inversedBy="representations")
     * @ORM\JoinColumn(nullable=false, name="show_id", referencedColumnName="id", onDelete="RESTRICT")
     */
    private $the_show;

    /**
     * @ORM\Column(type="datetime")
     */
    private $schedule;

    /**
     * @ORM\ManyToOne(targetEntity=Locations::class, inversedBy="representations")
	 * @ORM\JoinColumn(name="location_id", referencedColumnName="id", onDelete="RESTRICT")
     */
    private $the_location;

    /**
     * @ORM\OneToMany(targetEntity=RepresentationUser::class, mappedBy="representation")
     */
    private $reservation;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="presentation", orphanRemoval=true)
     */
    private $reservations;

    public function __construct()
    {
        $this->reservation = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheShow(): ?show
    {
        return $this->the_show;
    }

    public function setTheShow(?show $the_show): self
    {
        $this->the_show = $the_show;

        return $this;
    }

    public function getSchedule(): ?\DateTimeInterface
    {
        return $this->schedule;
    }

    public function setSchedule(\DateTimeInterface $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getTheLocation(): ?Locations
    {
        return $this->the_location;
    }

    public function setTheLocation(?Locations $the_location): self
    {
        $this->the_location = $the_location;

        return $this;
    }

    /**
     * @return Collection|RepresentationUser[]
     */
    public function getReservation(): Collection
    {
        return $this->reservation;
    }

    public function addReservation(RepresentationUser $reservation): self
    {
        if (!$this->reservation->contains($reservation)) {
            $this->reservation[] = $reservation;
            $reservation->setRepresentation($this);
        }

        return $this;
    }

    public function removeReservation(RepresentationUser $reservation): self
    {
        if ($this->reservation->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getRepresentation() === $this) {
                $reservation->setRepresentation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }
}
