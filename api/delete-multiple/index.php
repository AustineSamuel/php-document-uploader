<?php
require_once "../../config/cors.php";
require_once "../../config/enable-errors.php";
require_once  "../../helpers/response.php";
require_once  "../../services/delete.service.php";

if ($_SERVER["REQUEST_METHOD"] !== "DELETE") {
  jsonResponse(["success" => false, "message" => "DELETE only"], 405);
}

if (!isset($_GET["file"])) {
  jsonResponse([
    "success" => false,
    "message" => "File names required. Use ?file[]=a.jpg&file[]=b.png"
  ], 400);
}

// Ensure we always work with array
$files = is_array($_GET["file"]) ? $_GET["file"] : [$_GET["file"]];

$deleted = [];
$errors  = [];

foreach ($files as $file) {
  [$ok, $msg] = deleteFile($file);

  if ($ok) {
    $deleted[] = basename($file);
  } else {
    $errors[] = [
      "file" => basename($file),
      "error" => $msg
    ];
  }
}

if (!empty($deleted)) {
  jsonResponse([
    "success" => true,
    "message" => "Delete completed",
    "deleted" => $deleted,
    "errors"  => $errors
  ]);
}

jsonResponse([
  "success" => false,
  "message" => "No files were deleted",
  "errors"  => $errors
], 404);
