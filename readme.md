LLSM's Nette Sandbox
====================

Is Nette sandbox based app structure featuring modules with routing, dibi models and connection,
database controlled ACL (access control list), public front module with secured admin module.
For personal purposes I will be trying to make this up to date with current Nette

Nette Sandbox
-------------

Sandbox is a pre-packaged and pre-configured Nette Framework application
that you can use as the skeleton for your new applications.

[Nette](http://nette.org) is a popular tool for PHP web development.
It is designed to be the most usable and friendliest as possible. It focuses
on security and performance and is definitely one of the safest PHP frameworks.


Instaling Nette Sandbox
-----------------------

The best way to install Sandbox is using Composer. If you don't have Composer yet, download
it following [the instructions](http://doc.nette.org/composer). Then use command:

		composer create-project nette/sandbox my-app
		cd my-app

Make directories `temp` and `log` writable. Navigate your browser
to the `www` directory and you will see a welcome page. PHP 5.4 allows
you run `php -S localhost:8888 -t www` to start the web server and
then visit `http://localhost:8888` in your browser.

It is CRITICAL that whole `app`, `log` and `temp` directories are NOT accessible
directly via a web browser! See [security warning](http://nette.org/security-warning).

Using this project
------------------

If youre trying to use this project, bear in mind its really a playground for me and
it can change anytime.

License
-------
- Nette: New BSD License or GPL 2.0 or 3.0 (http://nette.org/license)
