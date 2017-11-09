This is lightweighted MVC framework integrated with H-ui, smarty and twig. It uses strict mode in PHP 7.

Framework directory
app 
├─admin   ---admin directory
├─api     ---api directory
├─index   ---index directory
├─libs    ---includes validate libs
├─common.php   --functions can be called globally
├─config.php   --app configuration, every module can has itself configuration file.
libs     ---core files
├─db     ---database directory
   ├─Database.php    ---database class
   ├─DB.php          ---DB CRUD commands
   ├─mysql.php       ---mysql engine extends Database.php
├─exception
   ├─ErrorException.php   --Convert errors to exceptions
   ├─Handler.php          --Exception handler
├─mvc                ---MVC file
   ├─Controller.php
   ├─Model.php
   ├─View.php
├─template           ---php template
   ├─smarty
   ├─twig
├─AutoLoader.php     ---PSR-4 Autoloader
├─BaseException.php  ---Custom exception class extends PHP built-in Exception class 
├─Common.php         ---Global functions
├─Config.php         ---Set/Get configuration of framework
├─Convention.php     ---Configuration template
├─Cookie.php         ---Cookie methods
├─Error.php          ---Set error/exception handler
├─Log.php            ---Log web and database request
├─Pagination.php
├─Request.php
├─Response.php
├─Route.php
├─Session.php
├─Start.php
├─Template.php
├─URL.php
├─Validate.php
