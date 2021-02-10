# IT&C 210 Lab 5B Writeup

__Name__: Braden Drake

## Explore Regex (20 points)

### Emails

`/^pattern$/gm`
Email Pattern
![Email Pattern](PNG/emailregex.png)
Email Matches
![Email Matches](PNG/emailmatches.png)

### Phone Numbers

`/^pattern$/gm`
Phone Pattern
![Phone Pattern](PNG/phoneregex.png)
Phone Matches
![Phone Matches](PNG/phonematch.png)

## Fail2Ban Log (10 points)

![Fail2Ban Log](PNG/fail2banlog1.png)
![Fail2Ban Log](PNG/fail2banlog.png)

## Custom Jails (20 points)

### `jail.local`
Custom Jail 1 (jail.local)
![Custom Jail 1 (jail.local)](PNG/customJail1JAILLOCAL.png)
Custom Jail 2 (jail.local)
![Custom Jail 2 (jail.local)](PNG/customJail2JAILLOCAL.png)

### `filter.d/jail.conf`
Custom Jail 1 (filter.d)
![Custom Jail 1 (filter.d)](PNG/customJail1FILTERd.png)
Custom Jail 2 (filter.d)
![Custom Jail 2 (filter.d)](PNG/customJail2FILTERd.png)


## `fail2ban-regex` (10 points)
Custom Jail 1 (fail2ban-regex)
![Custom Jail 1 (fail2ban-regex)](PNG/customJail1RegexTester.png)
Custom Jail 2 (fail2ban-regex)
![Custom Jail 2 (fail2ban-regex)](PNG/customJail2RegexTester.png)

Custom Jail 1&2 ban list
![Custom Jail 1 & 2 (ban list)](PNG/customJail12ban.png)

## Python script (40 points)

![Ban action Python](PNG/pythonbanaction.png)

This Python script is a "ban-action." When a user is banned an email is sent to my inbox alerting me that there has been a banning and that I need to check the log to see what the problem is. This would be useful to an administrator because it would alert them of potential hacks and give them time during the ban to find out what triggered the ban action.  
