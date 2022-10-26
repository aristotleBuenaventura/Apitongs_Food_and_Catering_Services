<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51LCbYJGAa8q0wZF9nlLFs4Gw7feqgiEB669R6nRfZtSCp5pdVnfmmjpEQWQ8N3IMjjEihowlE2KhB5elj1i0NrIj007iFBGsA2",
        "publishableKey" => "pk_test_51LCbYJGAa8q0wZF9bQztzUkRIbYuS8q0sNaaQlcQpSk3e86LGEPxgYR0XNVrGZy1oiPN5FKAsTgfEzF4GQvJNgLV00RM4tGfeV"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>