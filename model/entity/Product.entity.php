<?php

class Product
{
    private $productId;
    private $productCategoryId;
    private $colorId;
    private $productName;
    private $productDescription;
    private $stockSizeXxs;
    private $stockSizeXs;
    private $stockSizeS;
    private $stockSizeM;
    private $stockSizeL;
    private $stockSizeXl;
    private $stockSizeXxl;
    private $productImage1;
    private $productImage2;
    private $productImage3;
    private $productImage4;
    private $productPrice;
    private $dateRegistry;
    private $dateUpdate;

    public function __construct($productId, $productCategoryId, $colorId, $productName, $productDescription, $stockSizeXxs, $stockSizeXs, $stockSizeS, $stockSizeM, $stockSizeL, $stockSizeXl, $stockSizeXxl, $productImage1, $productImage2, $productImage3, $productImage4, $productPrice, $dateRegistry, $dateUpdate)
    {
        $this->productId = $productId;
        $this->productCategoryId = $productCategoryId;
        $this->colorId = $colorId;
        $this->productName = $productName;
        $this->productDescription = $productDescription;
        $this->stockSizeXxl = $stockSizeXxl;
        $this->stockSizeXl = $stockSizeXl;
        $this->stockSizeL = $stockSizeL;
        $this->stockSizeM = $stockSizeM;
        $this->stockSizeS = $stockSizeS;
        $this->stockSizeXs = $stockSizeXs;
        $this->stockSizeXxs = $stockSizeXxs;
        $this->productImage1 = $productImage1;
        $this->productImage2 = $productImage2;
        $this->productImage3 = $productImage3;
        $this->productImage4 = $productImage4;
        $this->productPrice = $productPrice;
        $this->dateRegistry = $dateRegistry;
        $this->dateUpdate = $dateUpdate;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function setProductCategoryId($productCategoryId)
    {
        $this->productCategoryId = $productCategoryId;
    }

    public function getProductCategoryId()
    {
        return $this->productCategoryId;
    }

    public function setColorId($colorId)
    {
        $this->colorId = $colorId;
    }

    public function getColorId()
    {
        return $this->colorId;
    }
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    public function getProductName()
    {
        return $this->productName;
    }
    public function setProductDescription($productDescription)
    {
        $this->productDescription = $productDescription;
    }

    public function getProductDescription()
    {
        return $this->productDescription;
    }
    public function setStockSizeXxl($stockSizeXxl)
    {
        $this->stockSizeXxl = $stockSizeXxl;
    }

    public function getStockSizeXxl()
    {
        return $this->stockSizeXxl;
    }

    public function setStockSizeXl($stockSizeXl)
    {
        $this->stockSizeXl = $stockSizeXl;
    }

    public function getStockSizeXl()
    {
        return $this->stockSizeXl;
    }

    public function setStockSizeL($stockSizeL)
    {
        $this->stockSizeL = $stockSizeL;
    }

    public function getStockSizeL()
    {
        return $this->stockSizeL;
    }

    public function setStockSizeM($stockSizeM)
    {
        $this->stockSizeM = $stockSizeM;
    }

    public function getStockSizeM()
    {
        return $this->stockSizeM;
    }


    public function setStockSizeS($stockSizeS)
    {
        $this->stockSizeS = $stockSizeS;
    }

    public function getStockSizeS()
    {
        return $this->stockSizeS;
    }

    public function setStockSizeXs($stockSizeXs)
    {
        $this->stockSizeXs = $stockSizeXs;
    }

    public function getStockSizeXs()
    {
        return $this->stockSizeXs;
    }

    public function setStockSizeXxs($stockSizeXxs)
    {
        $this->stockSizeXxs = $stockSizeXxs;
    }

    public function getStockSizeXxs()
    {
        return $this->stockSizeXxs;
    }

    public function setProductImage1($productImage1)
    {
        $this->productImage1 = $productImage1;
    }

    public function getProductImage1()
    {
        return $this->productImage1;
    }

    public function setProductImage2($productImage2)
    {
        $this->productImage2 = $productImage2;
    }

    public function getProductImage2()
    {
        return $this->productImage2;
    }

    public function setProductImage3($productImage3)
    {
        $this->productImage3 = $productImage3;
    }

    public function getProductImage3()
    {
        return $this->productImage3;
    }

    public function setProductImage4($productImage4)
    {
        $this->productImage4 = $productImage4;
    }

    public function getProductImage4()
    {
        return $this->productImage4;
    }

    public function setProductPrice($productPrice)
    {
        $this->productPrice = $productPrice;
    }

    public function getProductPrice()
    {
        return $this->productPrice;
    }
    public function setDateRegistry($dateRegistry)
    {
        $this->dateRegistry = $dateRegistry;
    }

    public function getDateRegistry()
    {
        return $this->dateRegistry;
    }

    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;
    }

    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }
}
