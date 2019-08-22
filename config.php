<?php

/**
 * Config file. Define constants
 */

// DB params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '1234');
define('DB_NAME', 'foo');

// App root
define('ROOT_DIR', dirname(dirname(__FILE__)));
// App name
define('NAME_APP', 'Test');
// URL root
define(
   "ROOT_HTTP",
   ($_SERVER['PHP_SELF'] == "localhost")
      ? "http://localhost/test/"
      : "http://test.test/"
);
