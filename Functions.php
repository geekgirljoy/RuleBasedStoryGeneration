<?php

// load a .txt file containing new line delimited parts of speech
function LoadListFile($filename){
    $filename .= '.txt'; // append .txt to the end of the file string
    $file = fopen($filename, 'r') or die('Unable to open file! $filename' . PHP_EOL); // open the file
    $data = fread($file,filesize($filename)); // read all of the data from the file
    fclose($file); // close the file
    $data = explode(PHP_EOL, $data); // array
    
    return $data;
}

// load all the parts of speech into an array and return
function LoadPartsOfSpeech(){

	// set up the parts of speech array
	$pos = array();

	// Punctuation
	$pos['space'] = ' ';
	$pos['comma'] = ',';
	$pos['period'] = '.';
	$pos['exclamation'] = '!';

	// Adjectives
	$pos['adjectives']['appearance'] = LoadListFile('Adjectives/adjectives-appearances');
	$pos['adjectives']['color'] = LoadListFile('Adjectives/adjectives-colors');
	$pos['adjectives']['conditions'] = LoadListFile('Adjectives/adjectives-conditions');
	$pos['adjectives']['negative_personality_traits'] = LoadListFile('Adjectives/adjectives-negative-personality-traits');
	$pos['adjectives']['positive_personality_traits'] = LoadListFile('Adjectives/adjectives-positive-personality-traits');
	$pos['adjectives']['unsorted'] = LoadListFile('Adjectives/adjectives-unsorted');

	// Adverbs
	$pos['adverbs']['unsorted'] = LoadListFile('Adverbs/adverbs-unsorted');

	// Conjunctions
	$pos['conjunctions']['pure'] = LoadListFile('Conjunctions/conjunctions-pure');
	$pos['conjunctions']['coordinating'] = LoadListFile('Conjunctions/conjunctions-coordinating');
	$pos['conjunctions']['correlative'] = LoadListFile('Conjunctions/conjunctions-correlative');
	$pos['conjunctions']['subordinating'] = LoadListFile('Conjunctions/conjunctions-subordinating');

	// Determiners
	$pos['determiners']['definite_article'] = LoadListFile('Determiners/determiners-definite-article');
	$pos['determiners']['demonstratives'] = LoadListFile('Determiners/determiners-demonstratives');
	$pos['determiners']['difference_words'] = LoadListFile('Determiners/determiners-difference-words');
	$pos['determiners']['distributives'] = LoadListFile('Determiners/determiners-distributives');
	$pos['determiners']['indefinite_articles'] = LoadListFile('Determiners/determiners-indefinite-articles');
	$pos['determiners']['numbers'] = LoadListFile('Determiners/determiners-numbers');
	$pos['determiners']['pre_determiners'] = LoadListFile('Determiners/determiners-pre-determiners');
	$pos['determiners']['pronouns_and_possessives'] = LoadListFile('Determiners/determiners-pronouns-and-possessives');
	$pos['determiners']['quantifiers'] = LoadListFile('Determiners/determiners-quantifiers');

	// Nouns
	$pos['proper_nouns']['male'] = LoadListFile('Nouns/proper-nouns-male');
	$pos['proper_nouns']['female'] = LoadListFile('Nouns/proper-nouns-female');
	$pos['proper_nouns']['last_names'] = LoadListFile('Nouns/last-names');
	$pos['proper_nouns']['alien_names'] = LoadListFile('Nouns/alien-names');
	$pos['nouns']['unsorted'] = LoadListFile('Nouns/nouns-unsorted');

	// Prepositions
	$pos['prepositions']['unsorted'] = LoadListFile('Prepositions/prepositions-unsorted');

	// Pronouns
	$pos['pronouns']['female'] = LoadListFile('Pronouns/pronouns-female');
	$pos['pronouns']['first_person']['plural'] = LoadListFile('Pronouns/pronouns-first-person-plural');
	$pos['pronouns']['first_person']['singular'] = LoadListFile('Pronouns/pronouns-first-person-singular');
	$pos['pronouns']['gender_neutral'] = LoadListFile('Pronouns/pronouns-gender-neutral');
	$pos['pronouns']['indefinite']['omni'] = LoadListFile('Pronouns/pronouns-indefinite-omni');
	$pos['pronouns']['indefinite']['plural'] = LoadListFile('Pronouns/pronouns-indefinite-plural');
	$pos['pronouns']['indefinite']['singular'] = LoadListFile('Pronouns/pronouns-indefinite-singular');
	$pos['pronouns']['interrogative'] = LoadListFile('Pronouns/pronouns-interrogative');
	$pos['pronouns']['male'] = LoadListFile('Pronouns/pronouns-male');
	$pos['pronouns']['posessive'] = LoadListFile('Pronouns/pronouns-posessive');
	$pos['pronouns']['relative'] = LoadListFile('Pronouns/pronouns-relative');
	$pos['pronouns']['second_person']['plural'] = LoadListFile('Pronouns/pronouns-second-person-plural');
	$pos['pronouns']['second_person']['singular'] = LoadListFile('Pronouns/pronouns-second-person-singular');
	$pos['pronouns']['third_person'] = LoadListFile('Pronouns/pronouns-third-person');

	// Verbs
	$pos['verbs']['past_participle'] = LoadListFile('Verbs/verbs-past-participle');
	$pos['verbs']['present_participle'] = LoadListFile('Verbs/verbs-present-participle');
	$pos['verbs']['simple_past'] = LoadListFile('Verbs/verbs-simple-past');
	$pos['verbs']['singular'] = LoadListFile('Verbs/verbs-singular');
	$pos['verbs']['unsorted'] = LoadListFile('Verbs/verbs-unsorted');

	// Misc. stuff that hasn't been properly sorted or is experamental
	$pos['actions'] = LoadListFile('Misc/actions');
	$pos['events'] = LoadListFile('Misc/events');
	$pos['locations'] = LoadListFile('Misc/locations');
	$pos['proximities'] = LoadListFile('Misc/proximities');
	//$pos['abilities']['scifi'] = LoadListFile.('Misc/abilities-scifi');
	//$pos['occupations']['old'] = LoadListFile('Misc/occupations-old');
	//$pos['occupations']['scifi'] = LoadListFile('Misc/occupations-scifi');
	//$skills_scifi = LoadListFile('Misc/skills-scifi');
	
	return $pos;
}


// get a random item from a list
function Get($list){
    return $list[random_int(0, count($list) - 1)];
}


// get a random item from a list of lists 
function FilteredGet($list){
    return Get($list[random_int(0, count($list) - 1)]);
}


function Name($gender = NULL){
    
    // access variables as globals, some programmers don't like using globals 
    // due to the fact that this overrides the standard scope however in
    // this case it simplifies function calls significantly so... meh!
    
    global $pos;
    
    $name = '';
    
    // if a gender was not specified or was incorrect then randomly 
    // select between male and female
    if($gender == NULL || $gender != 'male' || $gender != 'female'){
        $gender = random_int(0, 1);
        if($gender == 0){$gender = 'male';}
        else{$gender = 'female';}
    }
    
    // get first name
    $name .= Get($pos['proper_nouns'][$gender]);
    
    $name .= $pos['space']; // add a space
    
    // add last name
    $name .= Get($pos['proper_nouns']['last_names']);
    
    return $name;
}


function LookupGender($name){
    
    // access variables as globals, some programmers don't like using globals 
    // due to the fact that this overrides the standard scope however in
    // this case it simplifies function calls significantly so... meh!
    
    global $pos;
    
    if($name != NULL){
        
        $gender = 0; // start gender at 0
        
        // if the name is in the proper_nouns_male array then increment
        // the gender value
        if(in_array($name, $pos['proper_nouns']['male'])){
            $gender++;
        }
        
        // if name is in the proper_nouns_female array then decrement
        // the gender value, if the name was in the male list as well
        // then this will return the gender value to zero otherwise this
        // will make gender less than zero
        if(in_array($name, $pos['proper_nouns']['female'])){
            $gender--;
        }
        
        if($gender > 0){
            return 'man';
        }
        elseif($gender < 0){
            return 'woman';
        }
    }
    
    return 'person';
}


// this function will generate a sentence using the rule specified.
// there is an implemented (but unused) options array 
function Rule($number, $options = NULL){
	
	// access variables as globals, some programmers don't like using globals 
    // due to the fact that this overrides the standard scope however in
    // this case it simplifies function calls significantly so... meh!
	global $pos;
    
    // Rule 1 - proximity location, event
    // Examples: 
    // near a well fortified castle, science breakthroughs were made
    // below a rustic inn, a wolf howled
    // beyond a secret laboratory, a guy road a bike
    // next to a city jail, a book was written
    if($number == 1){
        return Get($pos['proximities']) . $pos['space'] . Get($pos['locations']) . $pos['comma'].  $pos['space'] . Get($pos['events']);
    }

    // Rule 2 - name, is very positive_personality_trait
    // Examples: 
    // Alannah Garza is very happy
    // Heidi Albert is very happy
    // Kora Atkinson is very inquisitive
    // Milani Craig is very thoughtful
    elseif($number == 2){
        return Name() . $pos['space'] . 'is very' . $pos['space'] . Get($pos['adjectives']['positive_personality_traits']);
    }

    // Rule 3 - name, is very negative_personality_trait
    // Examples: 
    // Alan Hawkins is very helpless
    // Sebastian Buckner is very crazy
    // Trace Gray is very vain
    // Ace Ayala is very bewildered
    elseif($number == 3){
        return Name() . $pos['space'] . 'is very' . $pos['space'] . Get($pos['adjectives']['negative_personality_traits']);
    }
    
    // Rule 4 - name, is condition
    // Examples: 
    // Vera Barber is mealy
    // Daniella Stokes is dead
    // Natalie Rowe is odd
    // Callen Sellers is clever
    elseif($number == 4){
        return Name() . $pos['space'] . 'is' . $pos['space'] . Get($pos['adjectives']['conditions']);
    }
    
    // Rule 5 - name, is a gender
    // Examples: 
    // Ty Phelps is a man
    // Leland Sellers is a man
    // Tenley Lawrence is a woman
    // Adelina Oneal is a woman
    elseif($number == 5){
        $name = Name();
        $firstname = explode(' ', $name);
        $firstname = $firstname[0];
        return $name . $pos['space'] . 'is a' . $pos['space'] . LookupGender($firstname);
    }
    
    // Rule 6 - name, is a appearance gender
    // Examples: 
    // Maia Petersen is a dazzling woman
    // Yosef Barnett is a elegant man
    // Marlon Burton is a drab man
    // Evelyn Ramsey is a chubby woman
    elseif($number == 6){
        $name = Name();
        $firstname = explode(' ', $name);
        $firstname = $firstname[0];
        return $name . $pos['space'] . 'is a' . $pos['space'] . Get($pos['adjectives']['appearance']) . $pos['space'] . LookupGender($firstname);
    }
    
    // Rule 7 - name action.
    // Examples: 
    // Jaliyah had a bad time.
    // Amia cooked a large feast.
    // Evelyn planted a sunflower.
    // Emery took a vacation.
    // Armani road a motorcycle.
    // Rowen had a wonderful time.
    // Mayson meditated.
    // Reece played sports.
    // Delilah had a wonderful time.
    // Marvin learned a new skill.
    elseif($number == 7){
        $name = Name();
        $firstname = explode(' ', $name);
        $firstname = $firstname[0];
        return $firstname . $pos['space'] . Get($pos['actions']) . Get($pos['period']);
    }
    
    
    
    // Rule 8 - complex rule
    // Examples: 
    // Nalani influenced obnoxiously the folder.
    // Kiara reacted thoughtfully today sitar.
    // Zaria trained At miserably station-wagon.
    // Kian distinguished Excluding the gland.
    // Patrick confirmed Since lower duty.
    elseif($number == 8){
		$output = (random_int(0,1) == 1 ? Get($pos['proper_nouns']['male']) : Get($pos['proper_nouns']['female']) ) . $pos['space'];
		$output .= Get($pos['verbs']['simple_past']) . $pos['space'];
		$output .= (random_int(0,1) == 1 ? Get($pos['adverbs']['unsorted']) : Get($pos['prepositions']['unsorted']) ) . $pos['space'];
		$output .= (random_int(0,1) == 1 ? Get($pos['adverbs']['unsorted']) : Get($pos['determiners']['definite_article']) ) . $pos['space'];
		$output .= Get($pos['nouns']['unsorted']) . Get(array($pos['period'], $pos['exclamation']));
		return $output;
	}

    // Rule 9 - complex rule
    // Examples: 
    // Neither Arturo nor Henley encountered the gift Before.
    // Neither Otto nor Sunny updated the millimeter During.
    // Ismael and Shiloh forgot the councilor next to.
    // Xavier and Malaysia warmed the tabletop wetly.
    // Neither Alijah nor Melissa leaped the theory anyway.
    // Joey and Alisha stayed the estate totally.
    elseif($number == 9){
		$output = FilteredGet(array($pos['proper_nouns']['male'], $pos['proper_nouns']['female'])) . $pos['space'];
		$conjunction = FilteredGet(array($pos['conjunctions']['pure'], $pos['conjunctions']['coordinating']), array('so'));
		if($conjunction == 'nor'){$output = 'Neither' . $pos['space'] . $output;}
		$output .= $conjunction . $pos['space'];
		$output .=  FilteredGet(array($pos['proper_nouns']['male'], $pos['proper_nouns']['female'])) . $pos['space'] .  Get($pos['verbs']['simple_past']) . $pos['space'];
		$output .= FilteredGet(array($pos['adverbs']['unsorted'], $pos['determiners']['definite_article'])) . $pos['space'];
		$output .= Get($pos['nouns']['unsorted']) . $pos['space'];
		$output .= FilteredGet(array($pos['adverbs']['unsorted'], $pos['prepositions']['unsorted'])) . $pos['period'];
		return $output;
	}
	
	/*
	 
	 // Add your rules here
	 
	elseif($number == 10){ 
		return $output;
	}
	
	elseif($number == 11){ 
		return $output;
	}
	
	* More rules...
	
	*/
	
}
