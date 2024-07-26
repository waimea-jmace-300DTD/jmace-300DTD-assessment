<?php



echo '<pre>';
print_r( $_POST );
echo '</pre>';

echo '<h2>Deleting User...</h2>';

$userID = $_GET['id'];

$db = connectToDB();

$sql = 'DELETE FROM users WHERE id=?' ;
$stmt = $db->prepare($sql);
$stmt->execute([$userID]);

header('hx-redirect: ' . SITE_BASE);

?>