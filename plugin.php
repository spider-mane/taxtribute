<?php

/**
 * This file is part of the Taxtribute WordPress plugin.
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 *
 * @package webtheory/taxtribute
 * @version 0.1.0
 * @license MIT
 * @copyright Copyright (C) 2021, Chris Williams, All rights reserved.
 * @link https://github.com/spider-mane/taxtribute
 * @author Chris Williams <spider.mane.web@gmail.com>
 *
 * @wordpress-plugin
 * Plugin Name: Taxtribute
 * Plugin URI: https://github.com/spider-mane/taxtribute
 * Description: Create terms that function as attributes
 * Version: 0.1.0
 * Requires at least: 5.0
 * Requires PHP: 7.3
 * Author: Chris Williams
 * Author URI: https://github.com/spider-mane
 * License: MIT
 * License URI: https://opensource.org/licenses/MIT
 * Text Domain: taxtribute
 * Domain Path: /languages
 */

use Leonidas\Framework\Helpers\Plugin;
use WebTheory\Taxtribute\Launcher;

defined('ABSPATH') || exit;

call_user_func(function () {
    $init = static function () {
        require __DIR__ . '/boot/init.php';

        Launcher::init(
            Plugin::base(__FILE__),
            Plugin::path(__FILE__),
            Plugin::url(__FILE__)
        );
    };

    did_action('leonidas_loaded')
        ? $init()
        : add_action('leonidas_loaded', $init);
});
