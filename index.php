<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require('Point3D.php');
    require('Triangle.php');
    require('Structure.php');
    require('NavigationStructure.php');
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

    $universe->addStructure(new NavigationStructure);
?>
<html>
    <body>
        <svg style="border:1px solid black;" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
            <?php
                foreach ($universe->flatten($player) as $structure) {
                    foreach ($structure as $triangle) {
                        foreach ($triangle['points'] as &$point) {
                            $point['x'] = $point['x'] + $width / 2;
                            $point['y'] = $height / 2 - $point['y'];
                            $point = implode(',', $point);
                        }
                    ?>
                        <polygon points="<?php echo implode(' ', $triangle['points']); ?>"
                                 style="fill:white;stroke:<?php echo $triangle['colour']; ?>;stroke-width:1" />
                    <?php
                    }
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
