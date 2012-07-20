<div>asdf</div>
<div class="form">
<?php echo $this->Form->create( 'StudySet' );
echo $this->Html->div('d',print_r($study,true));
echo $this->Form->input('users',array('type'=>'textbox','label'=>'users' ));
echo $this->Form->end( __( 'StudySet' ) ); ?>
</div>
<div>
sadf
</div>
<div class="form">
<?php echo $this->Form->create( 'UserAdmin' );
echo $this->Form->input('time', array('type' => 'hidden', 'value'=> ''));
echo $this->Form->end( __( 'UserAdmin' ) ); ?>
</div>
<div>asdf</div>