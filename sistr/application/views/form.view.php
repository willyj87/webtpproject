<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/12/16
 * Time: 11:03
 */
namespace Sistr;
use F3il\Application;
use F3il\Form;
use F3il\Page;

defined('SISTR') or die('Access Denied');
$this->setPageTitle("Form test");
?>
<h2>[%TITLE%]</h2>
<?php
    $this->testform->render();
?>

<pre><?php print_r($this->testform)?></pre>