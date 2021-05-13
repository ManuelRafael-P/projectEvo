<?php
class Color
{
    private $colorId;
    private $colorName;
    private $dateRegistry;
    private $dateUpdate;

    public function __construct($colorId, $colorName, $dateRegistry, $dateUpdate)
    {
        $this->colorId = $colorId;
        $this->colorName = $colorName;
        $this->dateRegistry = $dateRegistry;
        $this->dateUpdate = $dateUpdate;
    }

    public function setColorId($colorId)
    {
        $this->colorId = $colorId;
    }

    public function getColorId()
    {
        return $this->colorId;
    }

    public function setColorName($colorName)
    {
        $this->colorName = $colorName;
    }

    public function getColorName()
    {
        return $this->colorName;
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

    public function getDatesetDateUpdate()
    {
        return $this->dateUpdate;
    }
}
