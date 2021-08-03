<?php

namespace App\Entity;

use App\Repository\OrderDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderDetailsRepository::class)
 */
class OrderDetails
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $product_name;

    /**
     * @ORM\Column(type="float")
     */
    private $product_price;

    /**
     * @ORM\Column(type="text")
     */
    private $quantity;

    /**
     * @ORM\Column(type="text")
     */
    private $subtotalHT;

    /**
     * @ORM\Column(type="float")
     */
    private $taxe;

    /**
     * @ORM\Column(type="float")
     */
    private $subtotalTTC;

    /**
     * @ORM\ManyToOne(targetEntity=Orders::class, inversedBy="orderDetails")
     */
    private $orders;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): self
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getProductPrice(): ?float
    {
        return $this->product_price;
    }

    public function setProductPrice(float $product_price): self
    {
        $this->product_price = $product_price;

        return $this;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getSubtotalHT(): ?string
    {
        return $this->subtotalHT;
    }

    public function setSubtotalHT(string $subtotalHT): self
    {
        $this->subtotalHT = $subtotalHT;

        return $this;
    }

    public function getTaxe(): ?float
    {
        return $this->taxe;
    }

    public function setTaxe(float $taxe): self
    {
        $this->taxe = $taxe;

        return $this;
    }

    public function getSubtotalTTC(): ?float
    {
        return $this->subtotalTTC;
    }

    public function setSubtotalTTC(float $subtotalTTC): self
    {
        $this->subtotalTTC = $subtotalTTC;

        return $this;
    }

    public function getOrders(): ?Orders
    {
        return $this->orders;
    }

    public function setOrders(?Orders $orders): self
    {
        $this->orders = $orders;

        return $this;
    }
}
