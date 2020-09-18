<BODY>
<?PHP
$a = 10;
$b = 20;

echo sprintf("a: %d b: %d </br>", $a, $b);

$c = $a + $b;
$c *= 3;
echo sprintf('c: %d </br>', $c);

echo sprintf('c/(b-a)= %d </br>', $c / ($b - $a));

$p = "Программа";
$b = "работает";

$result = $p . ' ' . $b;
$result .= ' хорошо';
echo sprintf('result: %s </br>', $result);

$q = 5;
$w = 7;
echo sprintf('BEFORE: q: %d w: %d </br>', $q, $w);
$q += $w;
$w = $q - $w;
$q -= $w;
echo sprintf('AFTER: q: %d w: %d </br>', $q, $w);
?>
</BODY>