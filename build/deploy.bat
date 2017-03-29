@ECHO OFF
set login=
set pswd=
set appdir=
set confdir=

SET /p login=Enter login (teamadmn@team1635.org): 
IF NOT DEFINED login (set login=teamadmn@team1635.org)

SET /p pswd=Enter password: 
IF NOT DEFINED pswd (
    echo Cannot proceed without password
    exit /b 2
)

SET /p appdir=Enter remote application directory (www/scout17):  
IF NOT DEFINED appdir (set appdir=www/scout17)

SET /p confdir=Enter remote config area (dev/scout17): 
IF NOT DEFINED confdir (set confdir=dev/scout17)

pscp -P 2222 -pw %pswd% -sftp -r app/* %login%:%appdir%
pscp -P 2222 -pw %pswd% -sftp -r db/* %login%:%confdir%

set login=
set pswd=
set appdir=
set confdir=
