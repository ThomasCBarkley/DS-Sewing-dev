<?php

function getFeet($value) {
	return floor($value / 12);
}

function getInch($value) {
	return round(fmod($value, 12) ,2);
}