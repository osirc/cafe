<?php

include("summaryJSON.php");

$summary = new SummaryJSON();
echo json_encode($summary);

?>