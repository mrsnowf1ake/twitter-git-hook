<?php
session_start();
require_once 'external/twitteroauth/twitteroauth.php';
require_once 'keys.php';
$redir = False;
do {
if (isset($_REQUEST['oauth_token'])) {
    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['token'], $_SESSION['token_secret']);
    $access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
    $_SESSION['status'] = 'verified';
    $_SESSION['request_vars'] = $access_token;
    if (empty($_SESSION['request_vars']['oauth_token'])) {
        break;
    }
    $redir = True;
}
} while(0);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Twitter Git Hook Experiment</title>
    <link rel='stylesheet' type='text/css' href='style/main.css'>
    <?php
       if ($redir) {
       echo '<meta http-equiv="refresh" content="5; URL=http://git-hook.mrsnowf1ake.com/generatezip.php" />';
       }
    ?>
  </head>
  <body>
    <div class='container'>
      <h1>Twitter Git Hook Experiment</h1>
      <h2>Thanks for being a part of this!</h2>
      <?php
	 if ($redir) {
	 echo '<p><b>Your generated credentials will download in 5 seconds</b></p>';
	 }
      ?>
      <p>
	So, you've gone ahead and downloaded the zip file? Extract the contents
	into your project's `.git/hooks` directory. Make sure that post-commit is
	executable (and if it is not, run a <span style='color:blue'>chmod +x post-commit</span>).
	<span style='color:red'> If you already have a post-commit hook, please
	rename this and call it from your main post-commit.</span>
      </p>
      <p>
	Let's reiterate how to use this script... In your git commit message,
	surround text you want to send to Twitter with `_*` and `*_` like this:
	<pre>Initialize project _*Working on an awesome new project!*_</pre>
	If you have multiple blocks like that, it will send off multiple posts
	to Twitter. If you make the line too long, the script will split it up
	into multiple posts before sending it off to Twitter. Give it a shot!
      </p>
  </body>
</html>
