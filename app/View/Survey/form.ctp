<?php
echo $this->Form->create('survey');
#1
echo $this->Form->input('age',array('type'=>'textbox','label'=>'1) What is your age?' ));
#2
echo $this->Form->input('gender',array('type'=>'select','options' => array('','Male','Female'),'label'=>'2) What is your gender?' ));
#3
echo $this->Form->input('siblings',array('type'=>'textbox','label'=>'3) How many siblings do you have?' ));
#4
echo $this->Form->input('major',array('type'=>'textbox','label'=>'4) What is your major at the ISU?' ));
#5
echo $this->Form->input('education',array('type'=>'select','options' => array('','Undergraduate student','Graduate student'),'label'=>'5) Are you an undergraduate or graduate student?' ));
#6
echo $this->Form->input('year',array('type'=>'textbox','label'=>'6) Which year are you in your program?' ));
#7
echo $this->Form->input('participation',array('type'=>'select', 'options' => array('','Yes','No'),'label'=>'7) Have you ever participated in any economics or psychology experimental studies before?' ));
#8
echo $this->Form->input('ethnisity',array('type'=>'select','options' => array('','White','Black','Hispanic','Asian','Other (please specify)'),'label'=>'8) What do you consider your racial or ethnic background to be?' ));
echo $this->Form->input('ethnisity_other',array('type'=>'textbox','label'=>'If other' ));
#9
echo $this->Form->input('donations',array('type'=>'select','options' => array('','Yes','No'),'label'=>'9) In the past twelve months, have you donated money to or done volunteer work for charities or other nonprofit organizations?' ));
echo '<label>If Yes</label>';
echo $this->Form->input('donations_amount',array('type'=>'textbox','label'=>'$ amount' ));
echo $this->Form->input('donations_hours',array('type'=>'textbox','label'=>'Hours worked' ));
#10
?>
<label> 10) What was your SAT math and SAT verbal score?</label>
<?php
echo $this->Form->input('sats_math',array('type'=>'textbox','label'=>'Math:' ));
echo $this->Form->input('sats_verbal',array('type'=>'textbox','label'=>'Verbal:' ));
#11
echo $this->Form->input('career',array('type'=>'textbox','label'=>'11) What career would you like to pursue after graduation?' ));
#12
echo $this->Form->input('stress',array('type'=>'select','options' => array('','1','2','3','4','5','6','7','8','9','10'),'label'=>'12) How stressed did you feel during the experiment on a scale of 1 to 10. (10 being maximum stressed and 1 being no stress.)' ));


echo $this->Form->end('Submit');

/*
Step 12 Survey
Please answer the following survey questions. Your answers will be used for this study only. Individual data will not be exposed.
1. What is your age?
2. What is your gender? (a) Female (b) Male
3. How many siblings do you have?
4. What is your major at the ISU?
5. Are you an undergraduate or graduate student?
(a) Undergraduate student
(b) Graduate student
6. Which year are you in your program?
7. Have you ever participated in any economics or psychology experimental studies before?
(a) Yes.
(b) No.
8. What do you consider your racial or ethnic background to be?
(a) White
(b) Black
(c) Hispanic
(d) Asian
(e) Other (please specify)
9. In the past twelve months, have you donated money to or done volunteer work for charities or other nonprofit organizations?
(a) Yes.
Please specify the amount $ ....
or The number of hours
(b) No.
10. What was your SAT math and SAT verbal score?
Math:
Verbal:
11. What career would you like to pursue after graduation?
12. How stressed did you feel during the experiment on a scale of 1 to 10. (10 being maximum stressed and 1 being no stress.)
*/

?>
