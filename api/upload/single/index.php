<?php
require_once "../../../config/cors.php";
require_once "../../../config/enable-errors.php";
require_once  "../../../helpers/response.php";
require_once  "../../../services/upload.service.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
  jsonResponse(["success" => false, "message" => "POST only","method"=>$_SERVER["REQUEST_METHOD"]], 405);
}

if (empty($_FILES)) {
  jsonResponse(["success" => false, "message" => "No file uploaded"], 400);
}

[$uploaded, $errors] = handleUpload($_FILES);

if (!empty($uploaded)) {
  jsonResponse([
    "success" => true,
    "message" => "File uploaded successfully",
    "url"     => array_values($uploaded)[0]
  ], 201);
}

jsonResponse([
  "success" => false,
  "message" => "Upload failed",
  "errors"  => $errors
], 400);
