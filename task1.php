<?php

// Base class for shapes
abstract class Shape {
    // Abstract method for area calculation
    abstract public function area();
}

// Derived class for circles
class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    // Method to calculate the area of the circle
    public function area() {
        return pi() * pow($this->radius, 2);
    }
}

// Derived class for rectangles
class Rectangle extends Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    // Method to calculate the area of the rectangle
    public function area() {
        return $this->width * $this->height;
    }
}

// For Example
$circle = new Circle(14.8);
$rectangle = new Rectangle(2, 3);

echo "Area of the circle: " . number_format($circle->area(), 2) . "\n";
echo "Area of the rectangle: " . number_format($rectangle->area(), 2) . "\n";

