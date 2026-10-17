# Dog-ear Books: a Cookie Connect demo for Craft

A made-up independent bookshop for trying [Cookie Connect for Craft](https://github.com/1994limited/cookie-connect-craft): twelve books and a journal, with

- a video held back until marketing cookies are allowed, with a placeholder (`templates/index.twig`);
- an analytics script that runs once analytics is allowed, and a box showing what `window.CookieConnect` knows;
- a cookie policy page that uses `{cookie_declaration}` and `{cookie_settings}`, as an editor would type them (`templates/cookies.twig`);
- a Cookie settings link in the footer: just a link to `#cookie-settings`;
- a pretend consent platform, `web/fake-cmp.js`, so you can try it all without an account anywhere.

The layout has nothing in its `<head>` for Cookie Connect: it adds itself.

## Running it with Herd or Valet

Make a MySQL database called `cookie_connect_craft_demo`, then:

```bash
composer install
cp .env.example .env
php craft setup/keys
php craft install --username=admin --email=admin@example.com --password=password --site-name="Dog-ear Books" --site-url='$PRIMARY_SITE_URL' --language=en-GB --interactive=0
php craft demo/content
```

Or with DDEV: `ddev start`, `ddev composer install`, then the same commands with `ddev craft`.

Sign in at `/admin` with the username and password you gave `craft install`. The ones above are for a local copy only.

## Trying it

1. **Settings → Plugins → Cookie Connect**: set Environments to `*` (it only loads in `production` by default).
2. **Cookie Connect**: choose **Custom** and fill in

   | Field | Value |
   |---|---|
   | Consent platform code | `<script src="/fake-cmp.js"></script>` |
   | Tell Cookie Connect about consent | `FakeCmp.onChange(function (choice) { CookieConnect.set(choice); });` |
   | Open the preferences | `FakeCmp.open();` |

   Add a Google Tag Manager ID too, to see the order Consent Mode needs.
3. Open the site. Accept or reject in the pretend banner and watch the video, the analytics count and the box change. The footer link reopens it.

Then try it with your real platform: choose it and paste its ID.
