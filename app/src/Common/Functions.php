<?php

// .
declare(strict_types=1);

// .

namespace App\Common;

//.
use Psr\Log\LoggerInterface;
use Selective\Database\Connection;

// .
class Functions
{
  public $logger;
  public Connection $connection;

  //.
  public function __construct(Connection $connection, LoggerInterface $logger)
  {
    $this->connection = $connection;
    $this->logger = $logger;
  }

  // .
  public function test($msg)
  {
    // $query = $this->connection->select()->from('test');
    // $rows = $query->execute()->fetchAll() ?: [];
    // $this->logger->info( print_r( $query, true ) );
    // $this->logger->info( print_r( $rows, true ) );

    $this->logger->info($msg);
  }

  // .
  private function encrypt_decrypt($action, $string)
  {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = $this->settings["SALT"];
    $secret_iv = $this->settings["SALT_KEY"];

    // hash
    $key = hash("sha256", $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash("sha256", $secret_iv), 0, 16);

    if ("encrypt" === $action) {
      $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
      $output = base64_encode($output);
    } elseif ("decrypt" === $action) {
      $output = openssl_decrypt(
        base64_decode($string),
        $encrypt_method,
        $key,
        0,
        $iv
      );
    }

    return $output;
  }

  //
  public function format_file_size($bytes)
  {
    if ($bytes >= 1073741824) {
      $bytes = number_format($bytes / 1073741824, 2) . " GB";
    } elseif ($bytes >= 1048576) {
      $bytes = number_format($bytes / 1048576, 2) . " MB";
    } elseif ($bytes >= 1024) {
      $bytes = number_format($bytes / 1024, 2) . " KB";
    } elseif ($bytes > 1) {
      $bytes = $bytes . " bytes";
    } elseif ($bytes === 1) {
      $bytes = $bytes . " byte";
    } else {
      $bytes = "0 bytes";
    }
    return $bytes;
  }
}
