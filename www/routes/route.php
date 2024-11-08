<?php

preg_match("/\/([^?]*)/", $_SERVER["REQUEST_URI"], $matches);
return $matches[1];
