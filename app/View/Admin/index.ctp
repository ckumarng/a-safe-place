<div class="info" style="float:left;" >
<?php
echo $this->Html->para('d', 'Current Study ID:'.$studyID);
echo $this->Html->para('d', 'Start Time:'.$studyTime);
echo $this->Html->para('d', 'Treatment:'.$treatment);
echo $this->Html->div('d', 'Users:');
foreach( $participants as $p ){
    echo $this->Html->div('d', 'ID['.$p.']');

}
?>
</div>
<div class="form">
    <?php
echo $this->Form->create( 'StudySet' );
echo $this->Form->input('users',array('type'=>'textbox','label'=>'users' ));
echo $this->Form->input('group',array('type'=>'select','options' => array('select','no-select'),'label'=>'Study Group:', 'empty' => true ));
echo $this->Form->end( __( 'StudySet' ) ); ?>
</div>
<div class="form">
<?php echo $this->Form->create( 'UserAdmin' );
echo $this->Form->input('time', array('type' => 'hidden', 'value'=> ''));
echo $this->Form->end( __( 'UserAdmin' ) ); ?>
</div>
