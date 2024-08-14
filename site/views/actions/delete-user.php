<?php

$db = connectToDB();

$sql = 'DELETE FROM users WHERE id=?' ;
$stmt = $db->prepare($sql);
$stmt->execute([$id]);

header('hx-redirect: ' . SITE_BASE . '/jobs');

?>