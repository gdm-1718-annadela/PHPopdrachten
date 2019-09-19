<?php

//App base path
CONST BASE_PATH = __DIR__ . '/';

//load config 
require BASE_PATH . 'config.php';

//load controllers
require BASE_PATH . 'controllers/db.php';
require BASE_PATH . 'controllers/product.php';