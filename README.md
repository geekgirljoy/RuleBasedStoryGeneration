# RuleBasedStoryGeneration
One simple and seemingly effective way to generate a story that absolutely works (at least to some extent) is to use “rules” to select elements from groups or lists and assemble the parts into a story.

The idea is pretty simple actually, if you select or write good rules then the result is they would generate unique (enough) sentences that when combined are a story.

For example, lets say I create a generative “rule” like this:

**Rule:** proximity location, event.

Seems simple enough but this rule can actually generate quite a few mildly interesting sentences, like this one for example:

> in a railroad station, aliens attacked.

**Result:** (proximity: in) (location: a railroad station), (event: aliens attacked).

Not bad huh? [Keep Reading at my Blog](https://geekgirljoy.wordpress.com/2018/09/13/rule-based-story-generation/)


## Generate.php: 

```php
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
```


## Additional References: 

[Why Rule Based Story Generation Sucks](https://geekgirljoy.wordpress.com/2018/09/21/rule-based-story-code/)

[Bot Generated Stories](https://geekgirljoy.wordpress.com/2018/08/31/bot-generated-stories/)

[Bot Generated Stories II](https://geekgirljoy.wordpress.com/2018/09/05/bot-generated-stories-ii/)
