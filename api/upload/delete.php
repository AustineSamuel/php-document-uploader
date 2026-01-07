<?php
require_once __DIR__ . "../../helpers/response.php";
require_once __DIR__ . "../../services/delete.service.php";

if ($_SERVER["REQUEST_METHOD"] !== "DELETE") {
  jsonResponse(["success" => false, "message" => "DELETE only"], 405);
}

if (!isset($_GET["file"])) {
  jsonResponse(["success" => false, "message" => "File name required"], 400);
}

[$ok, $msg] = deleteFile($_GET["file"]);

if ($ok) {
  jsonResponse(["success" => true, "message" => $msg]);
}

jsonResponse(["success" => false, "message" => $msg], 404);
