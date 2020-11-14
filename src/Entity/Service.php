<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nameservice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameservice(): ?string
    {
        return $this->nameservice;
    }

    public function setNameservice(string $nameservice): self
    {
        $this->nameservice = $nameservice;

        return $this;
    }
}
