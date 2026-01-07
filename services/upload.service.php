<?php
require_once __DIR__ . "/../config/config.php";

function handleUpload(array $files) {

  global $UPLOAD_DIR, $ALLOWED_TYPES, $MAX_FILE_SIZE, $BASE_URL;

  if (!is_dir($UPLOAD_DIR)) {
    mkdir($UPLOAD_DIR, 0777, true);
  }

  $uploaded = [];
  $errors   = [];

  foreach ($files as $key => $file) {

    if ($file["error"] !== UPLOAD_ERR_OK) {
      $errors[$key] = "Upload error: " . $file["error"];
      continue;
    }

    if ($file["size"] > $MAX_FILE_SIZE) {
      $errors[$key] = "File too large. Max 250MB.";
      continue;
    }

    if (!in_array($file["type"], $ALLOWED_TYPES)) {
      $errors[$key] = "Invalid file type.";
      continue;
    }

    $safeName = preg_replace("/[^a-zA-Z0-9._-]/", "_", basename($file["name"]));
    $newName  = uniqid("", true) . "_" . $safeName;
    $target   = $UPLOAD_DIR . $newName;

    if (move_uploaded_file($file["tmp_name"], $target)) {
      $uploaded[$key] = $BASE_URL . "/uploads/" . $newName;
    } else {
      $errors[$key] = "Failed to save file.";
    }
  }

  return [$uploaded, $errors];
}
