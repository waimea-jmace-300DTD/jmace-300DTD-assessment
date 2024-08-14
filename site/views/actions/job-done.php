<?php

$db = connectToDB();

$query = 'UPDATE bookings SET done=true WHERE id=?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

header('hx-redirect: ' . SITE_BASE . '/employees');

?>