<?php
require_once "../../../config/enable-errors.php";
require_once  "../../../helpers/response.php";
require_once  "../../../services/upload.service.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  jsonResponse(["success" => false, "message" => "POST only"], 405);
}

if (empty($_FILES)) {
  jsonResponse(["success" => false, "message" => "No files uploaded"], 400);
}

[$uploaded, $errors] = handleUpload($_FILES);

if (!empty($uploaded)) {
  jsonResponse([
    "success" => true,
    "message" => "Files uploaded successfully",
    "files"   => $uploaded
  ], 201);
}

jsonResponse([
  "success" => false,
  "message" => "Upload failed",
  "errors"  => $errors
], 400);
