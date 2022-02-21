<?php

function autoloader($class)
{
  $file = str_replace('\\', '/', __DIR__ . '/core/' . $class . '.php');
  if (file_exists($file)) {
    include $file;
  }
}

spl_autoload_register('autoloader');
