Internet Airline -- Read Me

*By: Tony Ketcham*

**To Launch Website with Server + Database:**

Open USBWebserver.exe. Click ‘Localhost’ to launch the website in a local
server.\*\* To view the database structure and tables as an admin, go back to
the USBWebserver window and click ‘PHPMyAdmin’. The login details for the
backend of the database are given on its login page.

**Troubleshooting:**

\**If the website fails to launch:* close the website tab(s) and close
USBWebserver. Re-open USBWebserver and click on ‘localhost’ again. In
worst-case, repeat this until functioning.

If continuously greeted with **a black background** on the homepage of the
website with **errors pertaining to MySQL** being denied access by the computer,
make sure to click OK on any popups to allow the localhost past the computer’s
firewall. As the project file has grown, I have experienced this error a handful
of times when initiating the localhost and attempting to view the website. **The
workaround** for this issue is to launch PHPMyAdmin and log in to the database.
This should forcefully initialize MySQL. Then open the localhost and the website
should launch.

\*\*\***Do NOT** copy files over to a different directory while USBWebserver is
running, or the server will catastrophically fail and be rendered inoperable. I
figured that out the hard way.

For reference, a **successful launch of the website** will display this welcome
page:

![](media/84c0428eadda91b351da28def74387f8.png)

**To Test Use of Cookies:**

Sign in to an account, then close the website and USBWebserver. Re-open
USBWebserver, click localhost, and the website will launch in a new tab. You
should see that you are still signed in.

I used Session functionality and variables instead of Cookies, since some modern
browsers have begun disabling Cookies for security purposes. The session
variables hold user info between making a query and the relevant search results.
A departing and returning flight ID are stored in the session variables, which
is then queried upon checkout to reflect user selections.

**Three Tier Architecture:**

*Presentation Tier:* developed in HTML5, CSS3, Bootstrap 4, and Javascript

*Business Logic Tier:* developed in php and jQuery

*Database Tier:* MySQL, contained in USBWebserver for local hosting

**Index choice:**

This database is powered by the InnoDB storage engine which is optimized for the
protection of user data by using commit, rollback, and crash-recovery. It is
also optimized for multi-user concurrency/query performance, so it is a highly
scalable engine. InnoDB instantiates **clustered indexes/B-tree** format to
reduce the I/O cost for common queries.

**Triggers:**

I replaced the triggers with handling logic in PHP within the middle tier, since
my version of MySQL does not allow for the use of multiple triggers on a single
action time. They were also not functioning correctly when I implemented them.
