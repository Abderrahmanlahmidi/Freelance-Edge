<?php

function basePath($path = '')
{
  return __DIR__ . '/' . $path;
}

function basePathController($path = '')
{
  return __DIR__ . '/App/Controllers/' . $path . ".php";
}



