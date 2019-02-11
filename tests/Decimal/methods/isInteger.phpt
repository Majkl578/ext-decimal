--TEST--
Decimal::isInteger
--FILE--
<?php
use Decimal\Decimal;

/**
 * op1, expected result
 */
$tests = [
    [ "1E-50",  false],
    ["-1E-50",  false],

    [0,         true],
    [1,         true],
    [2,         true],
    [3,         true],

    [-1,        true],
    [-2,        true],
    [-3,        true],

    ["1.5",     false],
    ["2.5",     false],
    ["3.5",     false],

    ["-INF",    false],
    ["INF",     false],
    ["NAN",     false],
];

foreach ($tests as $test) {
    $number = $test[0];
    $expect = $test[1];
    $result = Decimal::valueOf($number)->isInteger();

    if ($result !== $expect) {
        print_r(compact("number", "result", "expect"));
    }
}
?>
--EXPECT--
