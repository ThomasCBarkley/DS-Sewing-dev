/*
  form-to-mail.c
  
  A web page form e-mailer.
  
  
  by Bill Kendrick
  New Breed Software
  kendrick@zippy.sonoma.edu
  http://zippy.sonoma.edu/kendrick/
  
  January 6, 1997 - January 9, 1997 / March 25, 1997
*/

/*
  Required form fields:
    _to_address   -- email to send message to

  Optional form fields:
    _subject      -- subject for e-mail
    _from_address -- "reply-to" will be set to this address
    _reply_html   -- file to display when e-mail is sent successfully
    _need         -- (useable multiple times) will require that the
                     field named in "_need"'s value is filled out
    _need_email   -- same as "_need" except the field named in "_need_email"'s
                     value must be in e-mail address form
    _out_file     -- file to save entries to
    _delimiter    -- text string for the field delimiter when saving to file
                     (default, "\t" (TAB))
    _endrecord    -- text string for the "end-of-record" when saving to file
                     (defautl, "\n" (RETURN))
    _shownames    -- if "yes" (or "on"), will append field names to
                     field values when saving to file

  All other fields (which don't contain "_" as their name's first character)
  will be sent via e-mail (and to the output file, if set).
*/

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "cgi-util.h"


#define EMAIL_CMD "/bin/mail"

void convert(char * str);


int main(int argc, char * argv[])
{
  int i, j, found, fields, needs, changed, shownames, x, lastspace;
  char field_name[100][1024], field_val[100][10240], need_name[100][1024];
  char toaddress[1024], fromaddress[1024], subject[1024], replyhtml[1024],
    temp[10240], outfile[1024], delimit[1024], eor[1024];
  int need_email[100];
  FILE * pi, * fi;
  
  
  /* Initialize the CGI: */
  
  cgiinit();
  printf("Content-type: text/html\n\n");
  
  getentry(toaddress, "_to_address");
  getentry(fromaddress, "_from_address");
  getentry(subject, "_subject");
  getentry(replyhtml, "_reply_html");
  getentry(outfile, "_out_file");
  getentry(eor, "_endrecord");
  getentry(delimit, "_delimiter");
  shownames = getentryyesno("_shownames", 0);
  
  if (strlen(eor) == 0)
    strcpy(eor, "%n");
  convert(eor);
  
  if (strlen(delimit) == 0)
    strcpy(delimit, "%t");
  convert(delimit);
  
  if (strlen(toaddress) == 0)
    error("To address was not specified.\n");
  
  if (strlen(subject) == 0)
    strcpy(subject, "form-to-mail message");
  
  
  /* Collect the fields: */
  
  fields = 0;
  needs = 0;
  
  for (i = 0; i <= NUM_ENTRIES; i++)
    {
      if (entries[i].name[0] != '_')
	{
	  strcpy(field_name[fields], entries[i].name);
	  strcpy(field_val[fields], entries[i].val);
	  fields = fields + 1;
	}
      else if (strcmp(entries[i].name, "_need") == 0)
	{
	  strcpy(need_name[needs], entries[i].val);
	  need_email[needs] = 0;
	  needs = needs + 1;
	}
      else if (strcmp(entries[i].name, "_need_email") == 0)
	{
	  strcpy(need_name[needs], entries[i].val);
	  need_email[needs] = 1;
	  needs = needs + 1;
	}
    }
  
  
  for (i = 0; i < needs; i++)
    {
      found = 0;
      
      for (j = 0; j < fields; j++)
	{
	  if (strcmp(field_name[j], need_name[i]) == 0)
	    {
	      getentry(temp, field_name[j]);
	      if (strlen(temp) != 0)
		{
		  if (need_email[i] == 1)
		    {
		      if (goodemailaddress(temp))
			found = 1;
		    }
		  else
		    found = 1;
		}
	    }
	}
      
      if (found == 0)
	{
	  sprintf(temp, "You didn't fill out %s!\n", need_name[i]);
	  error(temp);
	}
    }
  
  
  /* Open the output file, if we need to: */

  if (strlen(outfile) != 0)
    {
      fi = fopen(outfile, "a");
      if (fi == NULL)
	error("Can't open output file!\n");
    }
  

  /* Open the e-mail command and spit out the e-mail's header: */
  
  sprintf(temp, "%s %s", EMAIL_CMD, toaddress);
  
  pi = popen(temp, "w");
  if (pi == NULL)
    error("Can't open e-mail program!\n");
  
  if (strlen(fromaddress) != 0)
    {
      fprintf(pi, "From: %s\nReply-To: %s\n", fromaddress, fromaddress);
      if (strlen(outfile) != 0)
	fprintf(fi, "%s", fromaddress);
    }
  
  fprintf(pi, "Subject: %s\n\n", subject);
  
  
  /* Sort the fields (so they're always in the same order (mainly for
     the sake of the output file) */
  
  do
    {
      changed = 0;
      
      for (i = 0; i < fields - 1; i++)
	{
	  if (strcmp(field_name[i], field_name[i + 1]) < 0)
	    {
	      strcpy(temp, field_name[i]);
	      strcpy(field_name[i], field_name[i + 1]);
	      strcpy(field_name[i + 1], temp);
	      changed = 1;
	    }
	}
    }
  while (changed != 0);
  
  
  /* Send out the now-sorted fields to the e-mail (and file): */
  
  for (i = 0; i < fields; i++)
    {
      getentry(temp, field_name[i]);
      
      
      /* Turn TABs into SPACEs */
      
      for (j = 0; j < strlen(temp); j++)
	{
	  if (temp[j] == '\t')
	    temp[j] = ' ';
	}
      
      
      fprintf(pi, "%s: ", field_name[i]);
      x = strlen(field_name[i]) + 2;
      
      
      /* Word-wrap it to 80 characters wide or less: */
      
      lastspace = -1;
      for (j = 0; j < strlen(temp); j++)
	{
	  if (temp[j] == ' ')
	    lastspace = j;
	  else if (temp[j] == '\n' || temp[j] == '\r')
	    {
	      x = 0;
	      lastspace = -1;
	    }
	  
	  x = x + 1;
	  
	  if (x == 78)
	    {
	      if (lastspace != -1)
		temp[lastspace] = '\n';
	      
	      x = 0;
	    }
	}
      
      fprintf(pi, "%s\n\n", temp);
      
      
      /* Save it to outfile, if need be: */
      
      if (strlen(outfile) != 0)
	{
	  /* Turn RETURNSs into SPACEs */
	  
	  for (j = 0; j < strlen(temp); j++)
	    {
	      if (temp[j] == '\t')
		temp[j] = ' ';
	    }
	  
	  if (i != 0)
	    fprintf(fi, "%s", delimit);
	  
	  if (shownames == 1)
	    fprintf(fi, "%s:", field_name[i]);
	  
	  fprintf(fi, "%s", temp);
	}
    }
  
  if (strlen(outfile) != 0)
    {
      fprintf(fi, "%s", eor);
      fclose(fi);
    }
  
  pclose(pi);
  
  
  /* Dump out the thank you message.  If no replyhtml was specified,
     or the file wouldn't open, spit out a generic one. */
  
  found = 1;
  
  if (strlen(replyhtml) == 0)
    found = 0;
  else
    {
      if (dump_no_abort(replyhtml) == -1)
	found = 0;
    }
  
  if (found == 0)
    {
      printf("<h1 align=center>Thanks</h1>\n");
      printf("Your message has been sent.<br>\n");
    }
  
  exit(0);
}


/* Convert "%" sequences into characters we recognize: */

void convert(char * str)
{
  int i, l;
  char result[10240];
  
  strcpy(result, "");
  
  for (i = 0; i < strlen(str); i++)
    {
      if (str[i] != '%')
	{
	  l = strlen(result);
	  result[l] = str[i];
	  result[l + 1] = '\0';
	}
      else
	{
	  if (i < strlen(str) - 1)
	    {
	      if (str[i + 1] == 'n')
		strcat(result, "\n");
	      else if (str[i + 1] == 't')
		strcat(result, "\t");
	      else if (str[i + 1] == '%')
		strcat(result, "%");
	      
	      i = i + 1;
	    }
	}
    }
  
  strcpy(str, result);
}
