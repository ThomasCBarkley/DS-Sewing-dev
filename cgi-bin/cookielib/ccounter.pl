#!/usr/bin/perl
##############################################################################
# Cookie Counter                Version 2.1                                  #
# Copyright 1996 Matt Wright    mattw@worldwidemart.com                      #
# Created 07/14/96              Last Modified 12/13/96                       #
# Scripts Archive at:           http://www.worldwidemart.com/scripts/        #
##############################################################################
# COPYRIGHT NOTICE                                                           #
# Copyright 1996 Matthew M. Wright  All Rights Reserved.                     #
#                                                                            #
# Cookie Counter may be used and modified free of charge by anyone so long as#
# this copyright notice and the comments above remain intact.  By using this #
# code you agree to indemnify Matthew M. Wright from any liability that      #  
# might arise from it's use.                                                 #  
#                                                                            #
# Selling the code for this program without prior written consent is         #
# expressly forbidden.  In other words, please ask first before you try and  #
# make money off of my program.                                              #
#                                                                            #
# Obtain permission before redistributing this software over the Internet or #
# in any other medium.  In all cases copyright and header must remain intact #
##############################################################################

# Allow script to use the Cookie Subroutines.  You may need to change this   #
# if cookie.lib is not in the same directory as this script.                 #
# Cookie Counter version 2.1 is written for HTTP Cookie Library 2.1          #

require 'cookie.lib';

# If there already is a count cookie, proceed without setting a new one.     #

if (&GetCookies('count')) {

    # Increment the counter.                                                 #

    $Cookies{'count'}++;

    # Print out the HTML Content-Type header.                                #

    print "Content-type: text/html\n";

    # Set the updated cookie with new count.                                 #

    &SetCookies('count',$Cookies{'count'});

    # End the headers sent to browser.                                       #

    print "\n";

    # Print Top of HTML Page                                                 #

    print "<html>\n";
    print " <head>\n";
    print "<title>Example Cookie Counter</title>\n";
    print " </head>\n";
    print " <body bgcolor=#FFFFFF text=#000000>\n";
    print "  <center><h1>Repeat Visitor!</h1>\n";

    # Print out how many times they have visited this script.                #

    print "You have been to this site $Cookies{'count'} times!<p>\n"; 

    # Print out the end of the HTML page.
    print "(This only works on Cookie-Capable Browsers)\n";
    print "<p><a href=\"http://www.worldwidemart.com/scripts/cookielib.shtml\">";
    print "Matt's Script Archive: HTTP Cookie Library</a>\n";
    print "</body></html>";
}

# Otherwise, if the use didn't already have a cookie, let's give them one!   #
else {

    # Print out the HTML Content-Type header.                                #
    print "Content-type: text/html\n";

    # Set a new cookie.                                                      #
    &SetCookies('count','1');

    # End the headers sent to browser.                                       #
    print "\n";

    # Print HTML Page                                                        #
    print "<html>\n";
    print " <head>\n";
    print "  <title>Example Cookie Counter</title>\n";
    print " </head>\n";
    print " <body bgcolor=#FFFFFF text=#000000>\n";
    print "  <center><h1>First Time, eh?</h1>\n";
    print "I can see this is your first time to load this page.\n";
    print "Reload to become a repeat visitor!<p>\n";
    print "(This only works on Cookie-Capable Browsers)\n";
    print "<p><a href=\"http://www.worldwidemart.com/scripts/cookielib.shtml\">";
    print "Matt's Script Archive: HTTP Cookie Library</a>\n";
    print "</body></html>\n";
}
