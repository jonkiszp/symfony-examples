<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name:"users")]
class User {
    #[ORM\Id]
    #[ORM\Column(type:"integer")]
    #[ORM\GeneratedValue()]
    private ?int $id = null;

    #[ORM\Column(type:"string")]
    private ?string $email = null;

    public function getId(): ?int {
        return $this->id;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }
}