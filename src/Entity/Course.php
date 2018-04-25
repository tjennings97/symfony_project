<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CourseRepository")
 */
class Course
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
    private $Code;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $Section;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $Professor;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $Days;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Time;

    /**
     * @ORM\Column(type="string", length=6, nullable=true)
     */
    private $Location;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Title;

    public function getId()
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->Code;
    }

    public function setCode(string $Code): self
    {
        $this->Code = $Code;

        return $this;
    }

    public function getSection(): ?string
    {
        return $this->Section;
    }

    public function setSection(string $Section): self
    {
        $this->Section = $Section;

        return $this;
    }

    public function getProfessor(): ?string
    {
        return $this->Professor;
    }

    public function setProfessor(?string $Professor): self
    {
        $this->Professor = $Professor;

        return $this;
    }

    public function getDays(): ?string
    {
        return $this->Days;
    }

    public function setDays(?string $Days): self
    {
        $this->Days = $Days;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->Time;
    }

    public function setTime(?string $Time): self
    {
        $this->Time = $Time;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(?string $Location): self
    {
        $this->Location = $Location;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(?string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }
}
