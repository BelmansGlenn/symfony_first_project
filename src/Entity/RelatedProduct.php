<?php

namespace App\Entity;

use App\Repository\RelatedProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RelatedProductRepository::class)
 */
class RelatedProduct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $related_id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="relatedProducts")
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRelatedId(): ?int
    {
        return $this->related_id;
    }

    public function setRelatedId(int $related_id): self
    {
        $this->related_id = $related_id;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}
