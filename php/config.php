<?php
ini_set( "display_errors", false );
date_default_timezone_set( "Asia/Kuala_Lumpur" );  
define( "DB_HOST", "localhost" );//PUT YOUR LOCALHOST/REMOTE ADDRESS
define( "DB_USERNAME", "root" );//PUT YOUR DB USERNAME
define( "DB_PASSWORD", "root" );//PUT YOUR DB PASSOWRD
define( "DB_NAME", "samandb" );//PUT YOUR DATABASE NAME

function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>

