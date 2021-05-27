<?php

class ProductCategory
{
    private $productCategoryId;
    private $productCategory;
    private $dateRegistry;
    private $dateUpdate;

    public function __construct($productCategoryId, $productCategory, $dateRegistry, $dateUpdate)
    {
        $this->productCategoryId = $productCategoryId;
        $this->productCategory = $productCategory;
        $this->dateRegistry = $dateRegistry;
        $this->dateUpdate = $dateUpdate;
    }

    public function setProductCategoryId($productCategoryId)
    {
        $this->productCategoryId = $productCategoryId;
    }

    public function getProductCategoryId()
    {
        return $this->productCategoryId;
    }

    public function setProductCategory($productCategory)
    {
        $this->productCategory = $productCategory;
    }

    public function getProductCategory()
    {
        return $this->productCategory;
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
