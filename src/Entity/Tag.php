<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
#[ApiResource(
    normalizationContext:['groups'=>['tag:read']],
    denormalizationContext:['groups'=>['tag:write']]
)]
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("tag:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups("tag:read","tag:write")
     */
    private $label;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }
}
