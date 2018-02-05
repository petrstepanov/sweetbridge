# Sweetbridge

Landing page for Sweetbridge, Inc.

### Twitter Mentions Feed Setup

Go to [https://apps.twitter.com/](https://apps.twitter.com/). Sign in and click `Create New App` button.
Fill in the `Application Details` form. The `Callback URL` field should be `http://your-website-url/callback.php`.

On the `Application Management` page go to `Keys and Access Tokens` tab. Copy `Consumer Key` and `Consumer Secret` values and paste them into `php/variables.php` file. Also type the correct value for `OAUTH_CALLBACK` constant in `php/variables.php`.
