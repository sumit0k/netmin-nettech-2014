Netmin v1.0.0
Developed by Sumit Kumar
https://github.com/sumitkumar1209/netmin-nettech-2014

								 PROJECT DETAILS
							------------------------

Product-Name                    -	NETMIN: Linux Server Management Tool (Web Interface)

Platform                        -	Linux(RHEL 4ES), Apache, php 4.3.9, HTML5, CSS3, JavaScript (with jQuery v@1.8.0)
 
Size                          	-	655 KB (66 PHP files)
 
Developer                   	-	SUMIT KUMAR
 
Recommended Environment      	-	RHEL 4ES server with APACHE and DNS activated
                   
						 WHAT THE PROJECT IS ALL ABOUT
					--------------------------------------

This project is a Linux administration tool that helps you to administer and monitor your linux server easily and effectively having Web Interface. It is suitably designed such that it looks and works good even on Mobile Web interface of sufficient screen size.

It includes : 
a) Apache Web server
	`Create a Virtual Server
	`Show Existing Virtual Servers (Tabular form)
b) Bind DNS Server
	`Create Master Zone
	`Create Slave Zone
	`Create Forward Zone
	`Edit Master Zone
		Address Records
		Name Server Records
		Name Alias Records
		Mail Server Records
	`List Existing Zones (Tabular form)
c) Executing Commands through Web Interface(Command Line Terminal)
d) Memory Management
	`View Partition Table
	`Free Disk Space
	`Status of RAM
	`Mount Information
e) File/Folder Management
	`Create/delete File/Folder
	`Add Content
	`Show All File/Folder (Tabular form)
	`Copy/Move File/Folder
	`Change Configuration
		Group
		Owner
		Permission
f) Firewall Configuration
	`TCP Configuration
	`ICMP Configuration
	`Show Firewall Rules
g) Group Management
	`Add Groups
	`Delete Groups
	`List All Groups (Tabular form)
h) Network Configuration
	`Add Interface
	`Delete Interface
	`List all Interface
i) User Management
	`Add User
	`Delete User
	`Change Password
	`List all users (Tabular form)
j) Process management
	`List all running processes (Tabular form)
	`List all non-root running processes (Tabular form)
	`List all Security Information (Tabular form)
	`List all Threads Information (Tabular form)
	`Kill running Process (Tabular form)
	`Kill logged in users (Tabular form)
k) Samba Sharing
	`Create File Share
	`Convert Unix users to Samba Users
	`Change Password of a Samba user
	`List all shared items
l) Service Management
Start, Stop, Restart and Find Status of following services
	`Telnet
	`SMTP
	`SSH
	`DNS
	`IPP
	`FTP
	`IMAP/POP3
	`Apache
	`Samba
	`Firewall
m) Other Services
	`Ping Utility
	`Port Status
 

								HOW TO USE
							-----------------

1) The Administrator needs to host a website whose document root is the folder containing undisturbed NETMIN files.
****Preferred and Sample Configuration is:
with the suitable IP

<VirtualHost 192.168.15.2>
DocumentRoot "/home/netmin"
ServerName netmin.com
<Directory "/home/netmin">
allow from all
Options +Indexes
</Directory>
ErrorLog /home/usper/error
</VirtualHost>

2) The Root Administrator needs to give permission to APACHE user by changing in /etc/sudoers file under User privilege specification as:

		apache ALL=(ALL) NOPASSWD:ALL

****Changing the name and location of any file will lead to an improper output.                          
								DISCLAIMER    
							----------------                          
                               
This software is developed as a part of Open source development Project. Any harm or destruction to property because of this software must not be considered as responsibility of owner. You are free to make changes and modify the project according to your requirements without the rights of the original developer.
It should be noted that images used are property of the developer and should not be used without prior information to the developer. Fonts used are property of their respective organizations.

Special thanks to Netmin Project (PHP) developer Arpit Mittal for his code which provided me the base for my version of Netmin Project

# Author : SUMIT KUMAR,Institute of Technology(Bilaspur),20-Jun-2014
# Github : /sumitkumar1209    