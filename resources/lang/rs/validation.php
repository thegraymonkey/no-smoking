<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "The :attribute must be accepted.",
	"active_url"           => "The :attribute is not a valid URL.",
	"after"                => "The :attribute must be a date after :date.",
	"alpha"                => "The :attribute may only contain letters.",
	"alpha_dash"           => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"            => ":attribute može sadržati samo slova i brojeve.",
	"array"                => "The :attribute must be an array.",
	"before"               => "The :attribute must be a date before :date.",
	"between"              => [
		"numeric" => "The :attribute must be between :min and :max.",
		"file"    => "The :attribute must be between :min and :max kilobytes.",
		"string"  => "The :attribute must be between :min and :max characters.",
		"array"   => "The :attribute must have between :min and :max items.",
	],
	"boolean"              => "The :attribute field must be true or false.",
	"confirmed"            => "The :attribute confirmation does not match.",
	"date"                 => ":attribute nije validan datum.",
	"date_format"          => "The :attribute does not match the format :format.",
	"different"            => "The :attribute and :other must be different.",
	"digits"               => "The :attribute must be :digits digits.",
	"digits_between"       => "The :attribute must be between :min and :max digits.",
	"email"                => ":attribute mora biti validna e-mejl adresa.",
	"filled"               => "The :attribute field is required.",
	"exists"               => "The selected :attribute is invalid.",
	"image"                => ":attribute mora biti slika.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => ":attribute mora biti broj.",
	"ip"                   => "The :attribute must be a valid IP address.",
	"max"                  => [
		"numeric" => ":attribute ne može biti veća od :max.",
		"file"    => ":attribute ne može biti veća od :max kilobajta.",
		"string"  => ":attribute ne može biti veća od :max znakova.",
		"array"   => ":attribute ne može biti veća od :max items.",
	],
	"mimes"                => ":attribute mora biti fajl tipa: :values.",
	"min"                  => [
		"numeric" => ":attribute mora biti makar :min.",
		"file"    => ":attribute mora biti makar :min kilobajta.",
		"string"  => ":attribute mora biti makar :min znakova.",
		"array"   => ":attribute mora biti makar :min items.",
	],
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => ":attribute mora biti broj.",
	"regex"                => "The :attribute format is invalid.",
	"required"             => ":attribute polje je obavezno.",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => [
		"numeric" => ":attribute mora biti :size.",
		"file"    => ":attribute mora biti :size kilobajta.",
		"string"  => ":attribute mora biti :size znakova.",
		"array"   => ":attribute mora sadržati :size items.",
	],
	"unique"               => ":attribute već postoji.",
	"url"                  => "The :attribute format is invalid.",
	"timezone"             => "The :attribute must be a valid zone.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => ['username' => 'Korisničko ime',
					 'email' => 'E-Mail',
					 'subject' => 'Predmet',
					 'message' => 'Poruka',
					 'description' => 'Opis',
					 'image' => 'Slika',
					 'content' => 'Sadržaj',
					 'topic' => 'Tema',
					 'title' => 'Naslov',
					 'reply' => 'Odgovor',
					 'daily_amount' => 'Dnevni iznos',
					 'daily_expense' => 'Dnevni trošak',
					 'photo' => 'Slika',
					 'date' => 'Datum',
					 'quit_date' => "Datum prestanka",
					 'start_date' => "Datum početka"]

];
