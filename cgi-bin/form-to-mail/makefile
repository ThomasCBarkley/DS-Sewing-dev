# makefile for form-to-mail
# by Bill Kendrick
# kendrick@zippy.sonoma.edu
# http://zippy.sonoma.edu/kendrick/

# Jan. 6, 1997 - Jan. 6, 1997 / Bug fix: Feb. 9, 1997


all:	form-to-mail.cgi


# CGI's:

form-to-mail.cgi:	form-to-mail.o cgi-util.o
	gcc	form-to-mail.o cgi-util.o -o form-to-mail.cgi
	chmod 755 form-to-mail.cgi
	strip form-to-mail.cgi


# CGI objects:

form-to-mail.o:	form-to-mail.c cgi-util.h
	gcc	form-to-mail.c -c


# Library objects:

cgi-util.o:	cgi-util.c cgi-util.h
	gcc	cgi-util.c -c
