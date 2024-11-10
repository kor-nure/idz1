<?php

return [
  "~^$~" => ["MainController", "get"],
  "~^file/(.*)$~" => ["FileController", "get"],
  "~^create$~" => ["FileController", "create"],
  "~^edit/(.*)$~" => ["FileController", "edit"],
  "~^api/create$~" => ["FileController", "apiCreate"],
  "~^api/edit$~" => ["FileController", "apiEdit"],
  "~^api/delete$~" => ["FileController", "apiDelete"],
];
