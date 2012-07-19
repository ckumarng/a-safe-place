<div class="users form">
<?php echo $this->Form->create( 'Login' ); ?>
    <fieldset>
        <legend><?php echo __( 'Please enter your email and password' ); ?></legend>
        <?php
        if( $login_id != '' ){ ?>
        <h3>Welcome Back </h3><a href="/login/reset">Not your ID?</a>
        <?php } ?>
    <?php
        echo $this->Form->input( 'ID', array( 'value' => $login_id ) );
        echo $this->Form->input( 'password' );
    ?>
    </fieldset>
<?php echo $this->Form->end( __( 'Login' ) ); ?>
</div>
<?php echo 'the password is: '. $password; ?>

