<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require('Point3D.php');
    require('Triangle.php');
    require('Universe.php');

    $width = 500;
    $height = 500;
    $zoom = pi() / 4;

    $elevation = isset($_REQUEST['elevation']) ? $_REQUEST['elevation'] : 90;

    if (isset($_REQUEST['deelevate'])) {
        $elevation -= 5;
    }

    if (isset($_REQUEST['elevate'])) {
        $elevation += 5;
    }

    $player = [
        'x'         => 0,
        'y'         => 0,
        'z'         => 0,
        'bearing'   => 0,
        'elevation' => pi() * $elevation / 180,
        'rotation'  => 0,
        'depth'     => max($width, $height) / 2 / tan($zoom)
    ];

    $z = rand(1000, 5000);
    $z = 1000;

    $universe = new Universe;

    $universe->addTriangle(new Triangle(new Point3D(-100, -100, $z), new Point3D(100, -100, $z), new Point3D(0, 200, $z)));
    $universe->addTriangle(new Triangle(new Point3D(400, -100, $z), new Point3D(600, -100, $z), new Point3D(500, 200, $z)));
?>
<html>
    <body>
        <svg style="border:1px solid black;" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
            <?php
                foreach ($universe->flatten($player) as $polygon) {
                    print_r($polygon);
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
        <form>
            <input type="hidden" name="elevation" value="<?php echo $elevation; ?>" />
            <input type="submit" name="deelevate" value="-" />
            Elevation: <?php echo $elevation; ?>
            <input type="submit" name="elevate" value="+" />
        </form>
    </body>
</html>
