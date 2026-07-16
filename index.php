<?php

session_start();

require_once 'config/config.php';
require_once 'config/database.php';

require_once 'core/Database.php';
require_once 'core/Model.php';
require_once 'core/Controller.php';
require_once 'core/Validator.php';
require_once 'core/App.php';

new App();