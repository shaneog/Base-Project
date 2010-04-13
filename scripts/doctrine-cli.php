#!/usr/bin/env php
<?php
define('APPLICATION_ENV', 'development');
 
require realpath(dirname(__FILE__) . '/../application/cli_bootstrap.php');
 
$application->getBootstrap()->bootstrap('doctrine');
$options = $application->getOption('doctrine');
 
 
// Config to have `generate-models-yaml` generate "PEAR Style Model Loading and Generation"
// That could be set in application.ini too (doctrine.generate_models_options.pearStyle = 1),
// but if you put it here, you can copy/paste from the doctrine documentation :)
$options['generate_models_options'] = array(
    'pearStyle'             => true,
    'baseClassesDirectory'  => null,
    'baseClassPrefix'       => 'Base_',
    'classPrefix'           => 'Model_',
    'classPrefixFiles'      => false,
    'generateTableClasses'  => true,
    'generateAccessors'     => false,
    'phpDocPackage'         => '',
    'phpDocSubpackage'      => '',
    'phpDocName'            => "",
    'phpDocEmail'           => '',
);

$cli = new Doctrine_Cli($options);
$cli->run($_SERVER['argv']);