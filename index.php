<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $view = [
        'x'         => 0,
        'y'         => 0,
        'z'         => 0,
        'bearing'   => 0,
        'elevation' => 0,
        'rotation'  => 0
    ];

    $zoom = 45;

    $window = [
        'x' => 1000,
        'y' => 500
    ];

    $y = rand(100, 500);

    $triangles = [
        [
            'x1' => -100,
            'y1' => $y,
            'z1' => -100,
            'x2' => 100,
            'y2' => $y,
            'z2' => -100,
            'x3' => 0,
            'y3' => $y,
            'z3' => 200
        ],
        [
            'x1' => 100,
            'y1' => $y,
            'z1' => -100,
            'x2' => 300,
            'y2' => $y,
            'z2' => -100,
            'x3' => 200,
            'y3' => $y,
            'z3' => 200
        ]
    ];

    $lines = [
        [
            'x1' => 10,
            'y1' => 10,
            'x2' => 100,
            'y2' => 100
        ],
        [
            'x1' => 20,
            'y1' => 20,
            'x2' => 200,
            'y2' => 200
        ]
    ];

    $lines = [];

    $depth = [
        'x' => $window['x'] / 2 / tan($zoom),
        'y' => $window['y'] / 2 / tan($zoom)
    ];

    foreach ($triangles as $triangle) {
        $points = [];
        for ($i = 1; $i <= 3; $i++) {
            $points[$i] = real($triangle["x{$i}"], $triangle["y{$i}"], $triangle["z{$i}"], $view, $depth, $window);
        }

        $lines[] = [
            'x1' => $points[1]['x'],
            'y1' => $points[1]['y'],
            'x2' => $points[2]['x'],
            'y2' => $points[2]['y']
        ];
        $lines[] = [
            'x1' => $points[2]['x'],
            'y1' => $points[2]['y'],
            'x2' => $points[3]['x'],
            'y2' => $points[3]['y']
        ];
        $lines[] = [
            'x1' => $points[3]['x'],
            'y1' => $points[3]['y'],
            'x2' => $points[1]['x'],
            'y2' => $points[1]['y']
        ];
    }

    function real($x, $y, $z, $view, $depth, $window)
    {
        //output(func_get_args());
        $distance = sqrt(pow($x - $view['x'], 2) + pow($y - $view['y'], 2) + pow($z - $view['z'], 2));
        //output($distance);

        $xRatio = $distance / $depth['x'];
        $yRatio = $distance / $depth['y'];

        $real['x'] = $x / $xRatio + $window['x'] / 2;
        $real['y'] = $window['y'] / 2 - $z / $yRatio;

        //output($real);

        return $real;
    }

    function output($output)
    {
        if (is_array($output)) {
            echo "<pre>" . print_r($output, true) . "</pre>";
        }
        else {
            echo "<pre>{$output}</pre>";
        }
    }
?>
<html>
    <body>
        <svg style="border:1px solid black;" width="<?php echo $window['x']; ?>" height="<?php echo $window['y']; ?>">
            <?php
                foreach ($lines as $line) {
                    ?>
                        <line x1="<?php echo $line['x1']; ?>" y1="<?php echo $line['y1']; ?>"
                              x2="<?php echo $line['x2']; ?>" y2="<?php echo $line['y2']; ?>"
                              style="stroke:rgb(255,0,0);stroke-width:1"/>
                    <?php
                }
            ?>
        </svg>
    </body>
</html>
