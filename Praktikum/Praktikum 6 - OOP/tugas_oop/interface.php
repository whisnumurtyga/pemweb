<?php 

interface Shape {
  public function calculateArea();
  public function calculatePerimeter();
}

class Circle implements Shape {
  private $radius;

  public function __construct($radius) {
    $this->radius = $radius;
  }

  public function calculateArea() {
    return pi() * $this->radius * $this->radius;
  }

  public function calculatePerimeter() {
    return 2 * pi() * $this->radius;
  }
}

class Rectangle implements Shape {
  private $length;
  private $width;

  public function __construct($length, $width) {
    $this->length = $length;
    $this->width = $width;
  }

  public function calculateArea() {
    return $this->length * $this->width;
  }

  public function calculatePerimeter() {
    return 2 * ($this->length + $this->width);
  }
}

$circle = new Circle(5);
echo "Area of the circle: " . $circle->calculateArea() . "\n";
echo "Perimeter of the circle: " . $circle->calculatePerimeter() . "\n";

$rectangle = new Rectangle(4, 6);
echo "Area of the rectangle: " . $rectangle->calculateArea() . "\n";
echo "Perimeter of the rectangle: " . $rectangle->calculatePerimeter() . "\n";


?>