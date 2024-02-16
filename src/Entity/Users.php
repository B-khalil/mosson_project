<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 58)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\OneToMany(targetEntity: MentorHasMembers::class, mappedBy: 'mentor')]
    private Collection $mentors;

    #[ORM\OneToMany(targetEntity: MentorHasMembers::class, mappedBy: 'member')]
    private Collection $members;

    public function __construct()
    {
        $this->mentors = new ArrayCollection();
        $this->members = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, MentorHasMembers>
     */
    public function getMentors(): Collection
    {
        return $this->mentors;
    }

    public function addMentor(MentorHasMembers $mentor): static
    {
        if (!$this->mentors->contains($mentor)) {
            $this->mentors->add($mentor);
            $mentor->setMentor($this);
        }

        return $this;
    }

    public function removeMentor(MentorHasMembers $mentor): static
    {
        if ($this->mentors->removeElement($mentor)) {
            // set the owning side to null (unless already changed)
            if ($mentor->getMentor() === $this) {
                $mentor->setMentor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MentorHasMembers>
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(MentorHasMembers $member): static
    {
        if (!$this->members->contains($member)) {
            $this->members->add($member);
            $member->setMember($this);
        }

        return $this;
    }

    public function removeMember(MentorHasMembers $member): static
    {
        if ($this->members->removeElement($member)) {
            // set the owning side to null (unless already changed)
            if ($member->getMember() === $this) {
                $member->setMember(null);
            }
        }

        return $this;
    }
}
