<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require('Point3D.php');
    require('Triangle.php');

    $player = [
        'x'         => 0,
        'y'         => 0,
        'z'         => 0,
        'bearing'   => 0,
        'elevation' => 0,
        'rotation'  => 0,
        'window'    => [
            'x'    => 1000,
            'y'    => 500,
            'zoom' => 45
        ]
    ];

    $y = rand(100, 500);

    $triangles = [
        new Triangle(new Point3D(-100, $y, -100), new Point3D(100, $y, -100), new Point3D(0, $y, 200)),
        new Triangle(new Point3D(100, $y, -100), new Point3D(300, $y, -100), new Point3D(200, $y, 200))
    ];

    $polygons = [];
    foreach ($triangles as $triangle) {
        $polygons[] = $triangle->flatten($player);
    }
?>
<html>
    <body>
        <svg style="border:1px solid black;" width="<?php echo $player['window']['x']; ?>" height="<?php echo $player['window']['y']; ?>">
            <?php
                foreach ($polygons as $polygon) {
                    foreach ($polygon as &$point) {
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
