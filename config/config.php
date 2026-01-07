<?php

$UPLOAD_DIR = dirname(__DIR__) . "/uploads/";

$ALLOWED_TYPES = [
  "image/jpeg",
  "image/png",
  "image/gif",
  "application/pdf",
  "video/mp4",
  "video/mpeg",
  "video/quicktime"
];

$MAX_FILE_SIZE = 250 * 1024 * 1024; // 250MB

$PROTOCOL = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$BASE_URL = $PROTOCOL . "://" . $_SERVER["HTTP_HOST"];
