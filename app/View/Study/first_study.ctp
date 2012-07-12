<?php

//echo time_elapsed( $timeNow - $timeSent );
//echo $this->Html->script('jquery');
/*
if ( isset($this->data['Q1'])  )
    $timeTaken = time() - (int) $this->data['Q1']['time'];
else $timeTaken = 0;
*/


echo $this->Html->script('timer');
echo $this->Form->create('Q1');

//debug($this->data);
?>
<style>
.grdhdr {background-color:#CCBB99;  font-family:'times new roman', proportional;
  font-weight:normal; font-size:18px; text-align:center; color:#502020 }
.grdbdy {background-color:#E8E0BB;  font-family:'times new roman', proportional;
  font-weight:normal; font-size:18px; text-align:center; color:#480E32 }
</style>


<!--<button onclick="myFunction()">Start time</button>-->


<!--<div id='timer' > </div>-->




<div id="question-block" style="width:500px;margin-left:auto;margin-right:auto;"><div style="float:right;">
<p id="timer"></p></div>
<table cellspacing=2 cellpadding=5 border=1 style="background-color:#857B7B;">
<!-- row 0   -->
 <tr><td class="grdhdr">test0
</td><td class="grdhdr">test0
</td><td class="grdhdr">test0
<!--</td><td class="grdhdr">test0
</td><td class="grdhdr">test0
</td>--></tr>
<!-- row 1   -->
<tr><!--td class="grdhdr">test1
</td><td class="grdbdy">test1-->
</td><td class="grdbdy">test1 <?php echo $this->Form->input('checkbox 1',array('type'=>'checkbox')); ?>
</td><td class="grdbdy">test1 <?php echo $this->Form->input('checkbox 2',array('type'=>'checkbox')); ?>
</td><td class="grdbdy">test1 <?php echo $this->Form->input('checkbox 3',array('type'=>'checkbox')); ?>
</td></tr>
<!-- row 2   -->
<tr><!--<td class="grdhdr">test2
</td><td class="grdbdy">test2-->
</td><td class="grdbdy">test2 <?php echo $this->Form->input('checkbox 4',array('type'=>'checkbox')); ?>
</td><td class="grdbdy">test2 <?php echo $this->Form->input('checkbox 5',array('type'=>'checkbox')); ?>
</td><td class="grdbdy">test2 <?php echo $this->Form->input('checkbox 6' ,array('type'=>'checkbox')); ?>
</td></tr>
<!-- row 3   -->
<tr><!--<td class="grdhdr">test3
</td><td class="grdbdy">test3-->
</td><td class="grdbdy">test3 <?php echo $this->Form->input('checkbox 7',array('type'=>'checkbox')); ?>
</td><td class="grdbdy">test3 <?php echo $this->Form->input('checkbox 8',array('type'=>'checkbox')); ?>
</td><td class="grdbdy">test3 <?php echo $this->Form->input('checkbox 9',array('type'=>'checkbox')); ?>
</td></tr>
<!-- end rows -->
</table>


<?php echo $firstnum.' * '.$secondnum.' = '; ?>





<?php
$js = 'function myFunction()
{
setInterval(function(){myTimer()},1000);
}

function myTimer()
{
var d=new Date();
var t=d.toLocaleTimeString();
document.getElementById("timer").innerHTML=t;
}';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//$this->Html->scriptStart();
//echo $this->Js->codeBlock($js);
//$this->Html->scriptEnd();
//echo $this->Html->para('',array('id'=>'timer'));
//echo $this->Html->div('timer-container');


echo $this->Form->input('time', array('type' => 'hidden', 'value'=> time()));
echo $this->Form->end('Submit');

echo $this->Form->create('reset');
echo $this->Form->input('time', array('type' => 'hidden', 'value'=> 'reset'));
echo $this->Form->end('reset');
?>
</div>



<script type="text/javascript">window.onload = CreateTimer("timer",<?php echo $timeleft ?>,"<?php echo $nextPage ?>" );</script>