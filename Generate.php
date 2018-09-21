<?php


// include all the functions
include('Functions.php');

// set up the parts of speech array
// functions will globally point to this variable
$pos = LoadPartsOfSpeech();

$number_of_sentences = 30; // how many sentences/rules are generated/used
$story = ''; // the string we concatenate rules on to

// for whatever number you set $number_of_sentences to...
foreach(range(1, $number_of_sentences, 1) as $number){
	
	$rule_subject = random_int(1, 3);
	
	// randomly determine the type of rule to use,
	// randomly select the rule, compute its result and concatenate with 
	// the existing $story
	if($rule_subject == 1){ // action or event
		
		$rule_subject = random_int(1, 4);
		
		if($rule_subject <= 3){
			 $story .= Rule(1); // event
		}
		elseif($rule_subject == 4){
			 $story .= Rule(7); // action
		}
	}
	elseif($rule_subject == 2){ // people related
		$rule_subject = random_int(1, 6);
		
		if($rule_subject == 1){
			 $story .= Rule(2);
		}
		elseif($rule_subject == 2){
			 $story .= Rule(3);
		}
		elseif($rule_subject == 3){
			 $story .= Rule(4);
		}
		elseif($rule_subject == 4){
			 $story .= Rule(5);
		}
		elseif($rule_subject == 5){
			 $story .= Rule(6);
		}
		elseif($rule_subject == 6){
			 $story .= Rule(7);
		}
	}
	elseif($rule_subject == 3){ // bot generated
		$rule_subject = random_int(1, 2);
		
		if($rule_subject == 1){
			 $story .= Rule(8);
		}
		elseif($rule_subject == 2){
			 $story .= Rule(9);
		}

	}
	
	    
    // if this is not the last sentence/rule concatenate a conjunction
    if($number <= ($number_of_sentences - 1)){
		$story .= $pos['space'] . Get($pos['conjunctions']['pure']) . $pos['space'];
	}
}

// after the loop wrap the text at 50 chars and output the story
echo wordwrap($story, 50, PHP_EOL);


/*
 * Example Output
 * 

Jayleen ended By the lip! so Jada called a family
member. nor Aidan Lester is gifted and Emma Walton
is very clumsy and Grey proceeded widely literally
runner. or Santana Norman is a man yet Nico
Bartlett is very pitiful yet Aliana Browning is
rich and Rowan introduced Past the colloquia. but
Holly built a robot. so Morgan Dorsey is a person
for London fooled Against the cappelletti. but
Neither Emory nor Angel angered the order angrily.
or Hezekiah Beasley is very panicky and Leighton
did almost vivaciously author. so Foster Justice
is a man but Rory Parker is a beautiful person so
Reagan Rivera is a person but Kai Zamora is clever
nor beyond a newspaper company, dinosaur bones
were uncovered yet beyond a houseboat, a bird
built a nest so Kyle Goff is a man or on the
mountains, a new species of insect was identified
nor Galilea Mckinney is very worried or Gunner Orr
is very guilty but Otto Gaines is a small man nor
Gia Hendrix is powerful and Robert Mcdaniel is a
beautiful man so to the south of a newspaper
company, science breakthroughs were made so
Carmelo Rodgers is very witty

 
Jayleen ended By the lip! so Jada called a family
member. nor Aidan Lester is gifted and Emma Walton
is very clumsy and Grey proceeded widely literally
runner. or Santana Norman is a man yet Nico
Bartlett is very pitiful yet Aliana Browning is
rich and Rowan introduced Past the colloquia. but
Holly built a robot. so Morgan Dorsey is a person
for London fooled Against the cappelletti. but
Neither Emory nor Angel angered the order angrily.
or Hezekiah Beasley is very panicky and Leighton
did almost vivaciously author. so Foster Justice
is a man but Rory Parker is a beautiful person so
Reagan Rivera is a person but Kai Zamora is clever
nor beyond a newspaper company, dinosaur bones
were uncovered yet beyond a houseboat, a bird
built a nest so Kyle Goff is a man or on the
mountains, a new species of insect was identified
nor Galilea Mckinney is very worried or Gunner Orr
is very guilty but Otto Gaines is a small man nor
Gia Hendrix is powerful and Robert Mcdaniel is a
beautiful man so to the south of a newspaper
company, science breakthroughs were made so
Carmelo Rodgers is very witty

   
 */
