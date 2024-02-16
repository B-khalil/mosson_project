<?php

namespace App\Entity;

use App\Repository\MentorHasMembersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MentorHasMembersRepository::class)]
class MentorHasMembers
{
    // // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // // private ?int $id = null;
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'mentors')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $mentor = null;
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'members')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $member = null;

    // public function getId(): ?int
    // {
    //     // return $this->id;
    // }

    public function getMentor(): ?Users
    {
        return $this->mentor;
    }

    public function setMentor(?Users $mentor): static
    {
        $this->mentor = $mentor;

        return $this;
    }

    public function getMember(): ?Users
    {
        return $this->member;
    }

    public function setMember(?Users $member): static
    {
        $this->member = $member;

        return $this;
    }
}
