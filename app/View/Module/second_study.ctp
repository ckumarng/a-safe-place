<?php
echo $this->Html->script('timer');
echo $this->Form->create('Q1');

//debug($this->data);
?>

<div id="question-block" style="width:500px;margin-left:auto;margin-right:auto;"><div style="float:right;">
<p id="timer"></p></div>
<?php //this is the old grid view. to keep or not to keep? ?>
<!--<table cellspacing=2 cellpadding=5 border=1 style="background-color:#857B7B;">-->
<!-- row 0   -->
<!-- <tr><td class="grdhdr">test0
</td><td class="grdhdr">test0
</td><td class="grdhdr">test0-->
<!--</td><td class="grdhdr">test0
</td><td class="grdhdr">test0
<!--</td></tr>-->
<!-- row 1   -->
<!-- <tr>-td class="grdhdr">test1
</td><td class="grdbdy">test1-->
<!--</td><td class="grdbdy">test1 <?php //echo $this->Form->input('checkbox 1',array('type'=>'checkbox')); ?>
</td><td class="grdbdy">test1 <?php //echo $this->Form->input('checkbox 2',array('type'=>'checkbox')); ?>
</td><td class="grdbdy">test1 <?php //echo $this->Form->input('checkbox 3',array('type'=>'checkbox')); ?>
</td></tr>-->
<!-- row 2   -->
<!--<<trtd class="grdhdr">test2
</td><td class="grdbdy">test2-->
<!--</td><td class="grdbdy">test2 <?php //echo $this->Form->input('checkbox 4',array('type'=>'checkbox')); ?>
</td><td class="grdbdy">test2 <?php //echo $this->Form->input('checkbox 5',array('type'=>'checkbox')); ?>
</td><td class="grdbdy">test2 <?php //echo $this->Form->input('checkbox 6' ,array('type'=>'checkbox')); ?>
</td></tr>-->
<!-- row 3   -->
<!--<tr><td class="grdhdr">test3
</td><td class="grdbdy">test3-->
<!--</td><td class="grdbdy">test3 <?php //echo $this->Form->input('checkbox 7',array('type'=>'checkbox')); ?>
</td><td class="grdbdy">test3 <?php //echo $this->Form->input('checkbox 8',array('type'=>'checkbox')); ?>
</td><td class="grdbdy">test3 <?php //echo $this->Form->input('checkbox 9',array('type'=>'checkbox')); ?>
</td></tr>-->
<!-- end rows -->
<!--</table>-->


<?php  echo $this->Form->input('answer',array('type'=>'textbox','label'=>$firstnum.' * '.$secondnum.' =','value'=>'' ));

echo $this->Form->input('time', array('type' => 'hidden', 'value'=> time()));
echo $this->Form->input('first', array('type' => 'hidden', 'value'=> $firstnum));
echo $this->Form->input('second', array('type' => 'hidden', 'value'=> $secondnum));
echo $this->Form->end('Submit');

echo $this->Form->create('reset');
echo $this->Form->input('time', array('type' => 'hidden', 'value'=> 'reset'));
echo $this->Form->end('reset');
?>
</div>

<script type="text/javascript">window.onload = CreateTimer("timer",<?php echo $timeleft ?>,"<?php echo $nextPage ?>");</script>
