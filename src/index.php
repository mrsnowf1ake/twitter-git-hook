<?php
session_start();
require_once 'external/twitteroauth/twitteroauth.php';
require_once 'keys.php';
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
$temporary_credentials = $connection->getRequestToken(OAUTH_CALLBACK);
$redirect_url = $connection->getAuthorizeURL($temporary_credentials['oauth_token']);
$_SESSION['request_vars'] = $access_token;
$_SESSION['token'] = $temporary_credentials['oauth_token'];
$_SESSION['token_secret'] = $temporary_credentials['oauth_token_secret'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Twitter Git Hook Experiment</title>
    <link rel='stylesheet' type='text/css' href='style/main.css'>
    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <div class='container'>
      <img src="images/logo.png" class="center">
      <h1>Twitter Git Hook</h1>
      <h2>Reach end users with every commit</h2>
      <p><b>This project is now open source. Check out the source at
    <a href='https://github.com/mrsnowf1ake/twitter-git-hook'>https://github.com/mrsnowf1ake/twitter-git-hook</a>
    </b></p>
    <p>
    As a developer, marketing can be tricky. So many hours that could be spent
    writing the next cool feature are instead being spent on trudging through
    social networks and trying to hype up the next release of your software.
    How often do you find a promise of frequent Twitter updates to be broken by
    teams who aren't big enough yet to have their own publicity crew? Yet, most
    developers have a log of updates through commit messages. There is some
    redundancy here. So, what if instead you could couple your publicity with
    your internal documentation? That is the problem the Twitter Git Hook
    project strives to solve.<br><br>
    Twitter Git Hook is a post-commit Git hook that allows you to post updates
    to Twitter through Git commits by surrounding text with _* and *_. Let's
    take a look at the example below:
    <pre>me@mrsnowf1ake$ git commit -m "Rename count to vertex_count. _*Cleaning up the code, expect a release soon!*_"</pre>
    Upon entering in this command, the Git hook will send "Cleaning up the code,
    expect a release soon!" to Twitter. In order for us to track usage, we also
    attach a tag, #githook, to the post. This may be removed for future
    versions. You can also track these posts here:
    <a href="https://twitter.com/search?q=%23githook&src=hash&f=realtime">#githook</a>
    </p>
    <p>
    If you run a Linux system with Git, you can use the bundled Python hook,
    or you can download the Ruby hook
    <a href="https://github.com/mrsnowf1ake/twitter-git-hook/blob/master/src/hook/post-commit-ruby">from GitHub.</a>
    Otherwise, hang tight. You can also write your own
    based on one of ours by visiting the
    <a href='https://github.com/mrsnowf1ake/twitter-git-hook'>Github</a>
    project page. The hooks are under the `src/hook` directory.
     </p>
      <p>
      <a href="<?php echo $redirect_url ?>" style="border: none;">
    <img src='images/twitter.png' />
      </a>
    </div>
  </body>
</html>
