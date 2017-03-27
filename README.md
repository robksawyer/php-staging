## Client Preview v3.2

The Client Preview platform is a media content management system. For instructions on how to use this platform once it is setup, login to your site and view the user guide (example.com/user-guide/).


#### Installation

1. Open the file "_includes/ssi/siteconfig.php" with a text editor and edit the usernames and passwords of the 3 login accounts and then save the file. You will need to write down these login accounts for later use.
1. Upload all of the files that were downloaded from the Github repository to the root folder of the domain that you would like to setup using FTP. This can be either a Linux server or a Windows server running PHP.
1. Open your site in a browser and login using the admin account. Once you are logged in, immediately go to the setup page to define the settings for this staging site.
1. Once this is done, the site is ready to use. While you are logged into the site, refer to the page labeled "User Guide" (http://example.com/user-guide/) for further instructions on how to use the Client Preview platform.


#### FAQ

- Q: Do I need to upload html files with my SWFs so that they can play in the browser?
- A: No. They play inline on the project page so all that you need to upload is raw SWFs.

- Q: What languages is the Client Preview platform built on?
- A: This platform is built using PHP & Javascript. However, it uses several other tools and libraries such as jQuery, BonobosCMS, jScrollPane, jReject & SWFObject.

- Q: Does this platform use a database?
- A. No. All of the media is stored locally and all of the settings are stored in dynamically generated PHP files.

- Q: Wouldn't it be way better if you just built this thing using a database?
- A: Yes. This platform was created, in part, to navigate "around" certain corporate IT policies that were making things difficult for some installations.

- Q: What software license is this platform published under?
- A: None.

#### Troubleshooting

- Problem: I have uploaded the files for this platform and when I visit the site in a browser, all I see is a bunch of files listed.
- Solution: Check your server for default document types. If you are on a Windows server you will need to add "index.php" as a default document type in IIS.

- Problem: The setup page doesn't seem to be changing anything.
- Solution: Check the file permission settings on your server. They should be set to 777 for any files and folders that are used by this platform.

- Problem: I can't delete project folders from the web interface.
- Solution: See the solution listed above.

- Problem: When I upload files using the web interface, they do not show up on the project page.
- Solution: Again, check the file permission settings.

- Problem: When I click on a SWF to view it on a project page, it seems to be playing the wrong flash file.
- Solution: Check the "uploads" folder inside the project folder you are working on. If someone has manually uploaded HTML files (via FTP), this problem sometimes occurs. You'll need to delete the HTML files and they shouldn't be there in the first place. You will need to use FTP to do this.

- Problem: I have a problem that is not listed here.
- Solution: Fix it yourself.


#### Contributors

Garrett Gillas //
Technical Production Manager
https://github.com/GarrettGillas

Kevin Jones //
Senior Presentation Layer Engineer

Todd Mellors //
QA Lead

Brooks Pleninger //
Senior Designer

Matt Bouchard //
Program Manager
