<h1>Hello!</h1>
<?php
$print = HtmlHelper;

$this->methods->requireLogin();

echo $this->Html->charset();

echo __d('study', 'fun fun fun');
?>