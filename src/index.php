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
  </head>
  <body>
    <div class='container'>
      <h1>Twitter Git Hook Experiment</h1>
      <h2>But like actually, I'd like a hand and I know this looks like an 80's site</h2>
      <p>This project is now open source. Check out the source at
    <a href='https://github.com/mrsnowf1ake/twitter-git-hook'>https://github.com/mrsnowf1ake/twitter-git-hook</a>
    </p>
    <p>
    We all know that writing documentation and updates sucks.
    Like, how often did you begin working on a new project being like
    "hey, imma gonna write updates and docs on this" and then a week
    later be like "... this is too hard, imma give up"? Anyway, nothing
    I can do about your laziness with docs... But updates? How about
    embed them into your commit messages? (You better write real commit
    messages... If you don't, you and I will never get along. I promise :D)
    What if you could just write <pre>me@swag$ git commit -m "Fix suckish bug _*Last bug squashed, deep fried, then digested. Release on Saturday*_"</pre> and
    everyone on Twitter saw your nasty comment about eating bugs? I would be
    totally down for that.
      </p>
      <p>
    So, help me with this little experiment. Authorize this program with
    Twitter (but make another account... I can't afford SSL, and besides,
    you already know you can't trust me since I suck at documentation)
    below, put the automatically downloaded file and git hook into the
    git hook directory in your project, and then give it a shot.
      </p>
      <p>
    Also, just a warning, I'm adding a tag #githook so I can track your
    usage of it. I don't mean to stalk you, but I just really REALLY want to
    see if you would use such a tool. And since you're posting publicly
    anyway, what do you care if I know you've written some smashing code?
    (PS: Also, obviously that means you can track what other people are up
    to and give them some moral support... Cause everyone knows that us
    programmers need a lot of moral support:
    <a href="https://twitter.com/search?q=%23githook&src=hash&f=realtime">#githook</a>
    and note that some of these might not be us.)
      </p>
      <p>
    Anyway, just want to say, <b>thanks for all the help!</b>
      </p>
      <a href="<?php echo $redirect_url ?>" style="border: none;">
    <img src='images/twitter.png' />
      </a>
      <p>
    Has only been tested on <span style='color:red;'>Linux</span> and the
    hook I provide requires <span style='color:red;'>Ruby</span> :)
      </p>
    </div>
  </body>
</html>
