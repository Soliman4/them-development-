<?php
require_once('../../../wp-load.php');
echo function_exists('get_header') ? "Working!" : "Broken";