<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\JoinColumn;
use App\Repository\LocationsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass=LocationsRepository::class)
 * @ORM\Table(name="locations")
 * @UniqueEntity("slug")

 */
class Locations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
	 
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $designation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity=Localities::class, inversedBy="locations")
	 * @JoinColumn(onDelete="RESTRICT")
     */
    private $locality;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $phone;
	/**
     * @ORM\OneToMany(targetEntity="App\Entity\Show", mappedBy="location")
     */
    private $shows;

    /**
     * @ORM\OneToMany(targetEntity=Representation::class, mappedBy="the_location")
     */


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getLocality(): ?Localities
    {
        return $this->locality;
    }

    public function setLocality(?Localities $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
	    /**
     * @return Collection|Show[]
     */
    public function getShows(): Collection
    {
        return $this->shows;
    }

    public function addShow(Show $show): self
    {
        if (!$this->shows->contains($show)) {
            $this->shows[] = $show;
            $show->setLocation($this);
        }

        return $this;
    }

    public function removeShow(Show $show): self
    {
        if ($this->shows->contains($show)) {
            $this->shows->removeElement($show);
            // set the owning side to null (unless already changed)
            if ($show->getLocation() === $this) {
                $show->setLocation(null);
            }
        }

        return $this;
    }
/**
     * @ORM\OneToMany(targetEntity="App\Entity\Representation", mappedBy="the_location")
     */
    private $representations;

    public function __construct()
    {
        $this->shows = new ArrayCollection();
        $this->representations = new ArrayCollection();
    }

    /**
     * @return Collection|Representation[]
     */
    public function getRepresentations(): Collection
    {
        return $this->representations;
    }

    public function addRepresentation(Representation $representation): self
    {
        if (!$this->representations->contains($representation)) {
            $this->representations[] = $representation;
            $representation->setTheLocation($this);
        }

        return $this;
    }

    public function removeRepresentation(Representation $representation): self
    {
        if ($this->representations->removeElement($representation)) {
            // set the owning side to null (unless already changed)
            if ($representation->getTheLocation() === $this) {
                $representation->setTheLocation(null);
            }
        }

        return $this;
    }

}
