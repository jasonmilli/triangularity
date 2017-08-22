<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require('Point3D.php');
    require('Triangle.php');
    require('Universe.php');

    $width = 1000;
    $height = 500;
    $zoom = 45;

    $player = [
        'x'         => 0,
        'y'         => 0,
        'z'         => 0,
        'bearing'   => 0,
        'elevation' => 0,
        'rotation'  => 0,
        'depth'     => $width / 2 / tan($zoom)
    ];

    $y = rand(100, 500);

    $universe = new Universe;

    $universe->addTriangle(new Triangle(new Point3D(-100, $y, -100), new Point3D(100, $y, -100), new Point3D(0, $y, 200)));
    $universe->addTriangle(new Triangle(new Point3D(400, $y, -100), new Point3D(600, $y, -100), new Point3D(500, $y, 200)));
?>
<html>
    <body>
        <svg style="border:1px solid black;" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
            <?php
                foreach ($universe->flatten($player) as $polygon) {
                    foreach ($polygon as &$point) {
                        $point['x'] = $point['x'] + $width / 2;
                        $point['y'] = $height / 2 - $point['y'];
                        $point = implode(',', $point);
                    }
                    ?>
                        <polygon points="<?php echo implode(' ', $polygon); ?>" style="fill:white;stroke:red;stroke-width:1" />
                    <?php
                }
            ?>
        </svg>
    </body>
</html>
