<?php

$pdo = new \PDO(
    'mysql:host=mysql;dbname=docker_test',
    'docker',
    'docker'
);

$stmt = $pdo->prepare('SELECT * FROM regions');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<pre><?php print_r($result) ?></pre>
