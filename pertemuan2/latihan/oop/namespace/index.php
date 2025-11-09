<?php

require_once 'app/init.php';

use app\Service\User as ServiceUser;


use app\Service\User as ProdukUser;

new ServiceUser();
echo"<br>";
new ProdukUser();
