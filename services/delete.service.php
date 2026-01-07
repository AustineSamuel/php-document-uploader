<?php
require_once __DIR__ . "/../config/config.php";

function deleteFile(string $file) {

  global $UPLOAD_DIR;

  $safeFile = basename($file);
  $path = $UPLOAD_DIR . $safeFile;

  if (!file_exists($path)) {
    return [false, "File not found"];
  }

  unlink($path);
  return [true, "File deleted successfully"];
}
