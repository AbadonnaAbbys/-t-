<?php
function test($phrase) {
	$res = 'Верно';
	$pairs = [
		')' => '(',
		']' => '[',
		'}' => '{',
	];
	$tmp = [];

	// remove all but braces;
	$phrase = preg_replace('~[^\(\)\{\}\[\]]~', '', $phrase);

	// check phrase
	if ($phrase) {
		$length = strlen($phrase);
		for ($i = 0; $i < $length; $i++) {
			$char = substr($phrase, $i, 1);
			if (!array_key_exists($char, $pairs) || end($tmp) !== $pairs[$char]) {
				array_push($tmp, $char);
			} else {
				array_pop($tmp);
			}
		}

		if (count($tmp) > 0) {
			$res = 'Не верно';
		}
	}

	return $res;
}

echo test('[dgs+dfg(-sdfg{4467-45346+347})]') . "\n";
echo test('678+56785-54[(***56785[)') . "\n";