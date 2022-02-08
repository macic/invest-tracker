<?php

function ania(string $ksywa, int $wiek, string $styl = "zajebisty") : string
{
    $string = $ksywa.PHP_EOL.
        $wiek.PHP_EOL.
        $styl.PHP_EOL;

    return $string;
}
    print ania(
        wiek: 33, ksywa: "dzidDzidor"
    );


$dzień = 34;
if ($dzień < 28) {
    print 'niebieski'.PHP_EOL;
}
elseif ($dzień >28 AND $dzień <30) {
    print "żółty";
}
else {
    print "czerwony".PHP_EOL;
}

print match ($dzień) {
    1,2,3,4,5,6 => 'niebieski',
    29,28,30 => 'zółty',
    31 => 'czerwony',
    default => 'chujwi'
};

class alojz
{
    public int|float $number;

/**
 * @param float|int $number
 */
public  function setNumber(float|int $number):void {
    $this->number = $number;
}

public function getNumber(): int|float
{
    return $this->number;
}

}

$huj = new alojz();
$huj->setNumber(5);
print $huj->getNumber().PHP_EOL;
$huj->setNumber(7.6);
print $huj->getNumber().PHP_EOL;
//$huj->setNumber("a");


$string = "czesc, jak sie masz?";
if (strpos($string, "jak") !== false) {
    print "Zawiera sie".PHP_EOL;
}
if(str_contains($string, 'jak')) {
    print "zawiera sue".PHP_EOL;
}
$search = "czEsc";
if(preg_match("/{$search}/i", $string)) {
    print "zawiera sie\n\t";
}
else {
    print 'nie ma tego tu'.PHP_EOL;
}
$search = "jak";
if (str_ends_with($string, 'masz?'))
{
    print 'zawiera sie\n';
}
else {
    print  'niy ma'.PHP_EOL;
}
printf("%s\t%s\t%f\n", $string, $search, "1001");

print "moja wersja pho to".PHP_VERSION.PHP_EOL;
print "nazwka pliku ze scieżką`: ".__FILE__.PHP_EOL."\n";
$zmienna = <<< EOF
Na pewno słyszałaś lub czytałaś, 
że mając insulinooporność trzeba zrezygnować z ... 
(tutaj możesz wstawić dowolny produkt) pieczywa, makaronu, owocó
w, czy słodkich posiłków. To NIEPRAWDA. Mając insulinooporność
 można jeść każdy z tych produktów.
EOF;
$zmienna2 = "Na pewno słyszałaś lub czytałaś, 
że mając insulinooporność trzeba zrezygnować z ... 
(tutaj możesz wstawić dowolny produkt) pieczywa, makaronu, owocó
w, czy słodkich posiłków. To NIEPRAWDA. Mając insulinooporność
 można jeść każdy z tych produktów.";
print $zmienna . "\n\t";
print $zmienna2 . "\n\t";


$imiona = "aluj*buj*twoj\n";
$cos = explode("*", $imiona);
print $imiona;
print_r($cos);

if(str_contains($imiona, 'ania')) {
    print "zawiera ania";
}
else {
    print 'nie zawiwera';
}
?>

