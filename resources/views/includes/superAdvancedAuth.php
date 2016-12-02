<?php
//if there is not logged in user, you get booted back to the - dare I say - beautiful landing page
if(!Session::get('logged_in_user')) {
  redirect('/');
}
?>
