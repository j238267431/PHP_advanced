<?php
class Rectangle
{
    protected $height;
    protected $width;

    /**
     * @param mixed $height
     */
    public function setHeight($height): void
    {
        $this->height = $height;
    }



    /**
     * @param mixed $width
     */
    public function setWidth($width): void
    {
        $this->width = $width;
    }

    public function getArea()
    {
        return $this->height * $this->width;
    }

}
class Square extends Rectangle
{
    /**
     * @param mixed $height
     */
    public function setHeight($height): void
    {
        $this->height = $height;
        $this->width = $height;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width): void
    {
        $this->width = $width;
        $this->height = $width;
    }
}

$figure = new Square();
$figure->setHeight(5);
$figure->setWidth(4);
echo $figure->getArea();