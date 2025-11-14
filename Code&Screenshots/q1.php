<?php
function calculateBill($kiloLiters) {
    $bill = 0;
    if ($kiloLiters <= 15) {
        $bill = $kiloLiters * 2; 
    } elseif ($kiloLiters <= 35) {
        $bill = 15 * 2 + (20 * 5); 
    } else {
        $bill = 15 * 2 + 20 * 5 + (($kiloLiters - 35) * 10);
    }
    return $bill + 50; 
}

$runningTotal = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $kiloLiters = $_POST['kiloLiters'];
}
$kiloLiters = $_POST['kiloLiters'];
if (!empty($_POST['kiloLiters'])) {
    $kiloLiters = trim($_POST['kiloLiters']);
    
    if ($kiloLiters === 'done') break;
    
    if (!is_numeric($kiloLiters) || $kiloLiters < 0) {
        echo "Invalid input. Please enter a non-negative numeric 
value.\n";
        continue;
    }
    $bill = calculateBill((int)$kiloLiters);
    echo "The water bill for this household is " . number_format($bill, 
2). "\n";
    $runningTotal += $bill;
    echo "Running total: " . number_format($runningTotal, 2) . "\n\n";
}

echo "Total bills generated: " . number_format($runningTotal, 2) . "\n";

?>