<?php

require_once __DIR__ . '/src/ProductRepository.php';
require_once __DIR__ . '/src/Db.php';

$pr = new ProductRepository();
$pr->find([]);
$pr->findById(1);
