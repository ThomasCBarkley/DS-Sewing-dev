#!/usr/local/bin/perl

$s = ".";
$s=~s/([^a-zA-Z0-9_.-])/uc sprintf("%%%02x",ord($1))/eg;

print $s;


require 'odfl.pl';

print odfl_ship_rate("06040","06040",150,55,55);

