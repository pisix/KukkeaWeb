<?php
/**
 * Minify config Class
 *
 * PHP Version 5.3
 *
 * @category  PHP
 * @package   Controller
 * @author    Slawomir Jasinski <slav123@gmail.com>
 * @copyright 2014 All Rights Reserved SpiderSoft
 * @license   Copyright 2013 All Rights Reserved SpiderSoft
 * @link      http://www.spidersoft.com.au/projects/codeigniter-minify/
 */

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Minify config gile
 *
 * @category  PHP
 * @package   Controller
 * @author    Slawomir Jasinski <slav123@gmail.com>
 * @copyright 2014 All Rights Reserved SpiderSoft
 * @license   Copyright 2012 All Rights Reserved SpiderSoft
 * @link      http://www.spidersoft.com.au/projects/codeigniter-minify/
 */

$config['assets_dir'] = 'assets';
$config['css_dir'] = 'css';
$config['js_dir'] = 'js';
$config['compression_engine'] = array('css' => 'minify', 'js' => 'closurecompiler'); // cssmin




// End of file minify.php
// Location: ./application/config/minify.php
