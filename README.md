# Sweetbridge

Landing page for Sweetbridge, Inc.

### Twitter Mentions Feed Setup

Go to [https://apps.twitter.com/](https://apps.twitter.com/). Sign in and click `Create New App` button.
Fill in the `Application Details` form. The `Callback URL` field should be `http://your-website-url/callback.php`.

On the `Application Management` page go to `Keys and Access Tokens` tab. Copy `Consumer Key` and `Consumer Secret` values and paste them into `php/variables.php` file. Make sure no spaces and new line symbols are added before or after these strings. Also type the correct value for `OAUTH_CALLBACK` constant in `php/variables.php`.

Open the landing page, scroll down to the Twitter mentions section. The authorization URL should be there. Follow the URL. Authorize the application. The redirect to the landing page should happen automatically.

Number of recent Twitter mentions on the landing page is stored in `php/variables.php` file.
