twitter-git-hook
================

The Twitter Git Hook project provides tools to post data to Twitter from Git
hooks. This project is the source for
[this experiment](http://git-hook.mrsnowf1ake.com/)

The hook is public domain, while the rest of the code is under MIT license.

What's the Point?
-----------------

Twitter Git Hook is a publicity tool.
* **Keep non-technical users in the loop** - By following you on Twitter, end
users can get a better idea of what you're up to. It's great for development
models that are more transparent.
* **Hype things up** - With users sharing your Tweets, you can reach a wider
audience of end users.
* **Make providing updates on development easy** - Since the Tweets are embedded
within the commit messages you already send off, it becomes trivial to give
regular status updates.

Usage
-----

Surround the text you want to send off to Twitter with _* and *_.
    git commit -m 'Initial commit _*Starting a cool new project!*_'

Send multiple Tweets.
    Add parallel impedances
    
    Parallel impedances are needed for basic circuit simplification. The
    implementation takes the reciprocal of the sum of reciprocals of
    individual impedances, eg:
        z_total = (z1^-1 + z2^-1 + ... + zn^-1)^-1
    _*You'll be able to simplify linear circuits completely with the next release!*_
    The feature is in: CircAnal.simplify_parallel(args)
    _*Release candidate tonight :)*_

Tweets that are too long are automatically split up into multiple.

Installation
------------

This section describes the installation and configuration of the server-side
software. If you are looking for client-side installation instructions (ie of
the git hook), check
[an existing implementation](http://git-hook.mrsnowf1ake.com/).

Installation should be fairly trivial.
* Place the project files on a server. Make sure you have PHP support.
* Go to https://dev.twitter.com/apps and register the application with Twitter.
* Set the Application Type to Read and Write, and the Callback URL to
http://yoursite.com/getauthorization.php
* Make a php file for the key, `keys.php`. This should just define
`CONSUMER_KEY`, `CONSUMER_SECRET`, and `OAUTH_CALLBACK` values from the
registration of the application. The `keys.php` file should be placed in a
location outside of the root domain. Modify the `require_once` calls in
`index.php` and `sendtweet.php` to reflect the new location of `keys.php`.
* Pray it runs :P
