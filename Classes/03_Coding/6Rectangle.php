<?php
class Rectangle
{
    public float $height;
    public float $width;
    public float $area = 0;
    public float $perimeter = 0;

    public function __construct($height, $width, $area = 0, $perimeter = 0)
    {
        $this->height = $height;
        $this->width = $width;
        $this->area = $area;
        $this->perimeter = $perimeter;
    }

    public function calculateArea(): void
    {
        $this->area = $this->width * $this->height;
    }

    public function calculatePerimeter(): void
    {
        $this->perimeter = ((2 * $this->width) + (2 * $this->height));
    }

    public function show(): string
    {
        return "Height: <span class='highlight'>{$this->height}</span><br>
                Width: <span class='highlight'>{$this->width}</span><br>
                Perimeter: <span class='highlight'>{$this->perimeter}</span><br>
                Area: <span class='highlight'>{$this->area}</span><br>";
    }
}

$r = new Rectangle(7, 8);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= basename(__FILE__) ?></title>
    <link rel="stylesheet" href="../../generic.css">
</head>

<body>
    <div class="container">
        <h1>Rectangle Info</h1>
        <?= $r->show() ?>

        <br><p><strong>Calculating...</strong></p>

        <?php
        $r->calculatePerimeter();
        $r->calculateArea();
        ?>

        <?= $r->show() ?>
    </div>
</body>

</html>
