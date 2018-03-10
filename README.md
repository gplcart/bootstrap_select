[![Build Status](https://scrutinizer-ci.com/g/gplcart/bootstrap_select/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gplcart/bootstrap_select/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gplcart/bootstrap_select/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gplcart/bootstrap_select/?branch=master)

Bootstrap Select is a [GPL Cart](https://github.com/gplcart/gplcart) module that integrates [Jquery Bootstrap Select](https://github.com/silviomoreto/bootstrap-select) plugin.

**Installation**

This module requires 3-d party library which should be downloaded separately. You have to use [Composer](https://getcomposer.org) to download all the dependencies.

1. From your web root directory: `composer require gplcart/bootstrap_select`. If the module was downloaded and placed into `system/modules` manually, run `composer update` to make sure that all 3-d party files are presented in the `vendor` directory.
2. Go to `admin/module/list` end enable the module
3. Adjust settings at `admin/module/settings/bootstrap_select`