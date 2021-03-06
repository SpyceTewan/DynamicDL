# DynamicDL 2.0 
Open source online file browser!  
Can be used in your website a download browser for your users!
# Features
* No complicated setup required
* Easy to use
* Low performance cost
* Server sided (PHP only)
* Uploadable files
# Usage
config.xml can be configured as you wish, but the default settings are fine!  
Paste all of your files into the 'download' directory. (Directory can be changed in config)  
**Note:** ALL of the files in the 'download' directory are downloadable!

# Config  
**title**  
  *Default:* Example  
  The headline of your page.  
  Will appear in the HTML <title> and as the headline of the site.  
 
**root**  
  *Default:* download  
  The root directory of your downloadables.  
    
**bytefactor**  
  *Default:* 2  
  How the file size should be displayed.
  0: *Byte*, 1: *KB*, 2: *MB*, 3: *GB*  
  
**decimal_points**  
  *Default:* 2  
  The amount of decimal points of the file size.  

**downloadable**
  *Default:* false
  If set to true, EVERYBODY will be able to upload files to the server! There is no password check so only activate this on a private http server!!
  
# Installation:
* Download everything
* Copy the files to your webspace
* Create a link to dyndl.php
* Put all of your files into the 'download' directory
* Done!  
Wasn't that complicated, was it?

# Changelog:
### v1.0
*First release*
### v1.1
*Changed config.xml arguments*
### v1.1 Patch 01
*Fixed major bugs that broke folder structures*
### v1.1 Patch 02
*Fixed bug that didn't add the path of the subdirectory into the download URL*
### v1.1 Security Patch 01
*Fixed XSS*
*Fixed entire file system beyond the download directory being exploreable because of ../*
### v2.0 Recode
*Completely redesigned everything
*Added file upload functionality
*Added download sub-site
