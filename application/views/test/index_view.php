
<?php

function calBMI($weight, $height)
{
    $bmi = $weight / ($height * $height);
    $result = '';

    if ($bmi < 18.5) {
        $result = "น้ำหนักต่ำกว่าเกณฑ์";
    } elseif ($bmi >= 18.5 && $bmi <= 22.9) {
        $result = "สมส่วน";
    } elseif ($bmi >= 23 && $bmi <= 24.9) {
        $result = "น้ำหนักเกิน";
    } elseif ($bmi >= 25 && $bmi <= 29.9) {
        $result = "โรคอ้วน";
    } elseif ($bmi > 29.9) {
        $result = "โรคอ้วนอันตราย";
    }
    return $result;
}

echo calBMI(70,1.75);
?>