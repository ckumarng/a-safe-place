<?php   $helper = array('Session');
   print_r($login_id);?>
<div class="users form">
<?php //echo $this->Session->flash('bl');

?>
<?php echo $this->Form->create('Login'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your email and password'); ?></legend>
    <?php
        echo $this->Form->input('ID', array('value' =>'d'));
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>
