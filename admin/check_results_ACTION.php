<?php
#----------------------------------------------------------------------
#   Initialization and page contents.
#----------------------------------------------------------------------

require( '../_header.php' );
echo "<p><a href='./'>Administration</a> &gt;&gt; <a href='check_results.php?forceReload=".time()."'>Check results</a> &gt;&gt; <b>Execution</b> (" . wcaDate() . ")</p>\n";

showUpdateSQL();

require( '../_footer.php' );

#----------------------------------------------------------------------
function showUpdateSQL () {
#----------------------------------------------------------------------

  echo "<pre>I'm doing this:\n";
  
  foreach( getRawParamsThisShouldBeAnException() as $key => $value ){
    if( preg_match( '/^setpos([1-9]\d*)$/', $key, $match ) && preg_match( '/^[1-9]\d*$/', $value )){
      $id = $match[1];
      $command = "UPDATE Results SET pos=$value WHERE id=$id";
      echo "$command\n";
      dbCommand( $command );
    }
  }
  
  echo "\nFinished.</pre>\n";
}

?>
