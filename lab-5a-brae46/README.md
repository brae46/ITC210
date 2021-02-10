## How to get the Cookie
 1. Go enter the desired base url onto the web browser and add the following extension: 
 **/api/v1/auth/google**
 
 (ex. http://s1.it210.it.et.byu.edu/api/v1/auth/google
 
 2. Sign into your Google account where you should be brought to the corresponding link's 
 **/api/vi/task** page
 
 3. Right click on the mouse and hit "inspect"
 
 4. Go to the "Application" section of the "inspect" window 
 
 5. Find the section within "Application" called "Cookies"
 
 6. Click on the "Cookies" and find the one titled 
 
 **"it210_session="**
 
 7. Copy the value of the cookie with that name and paste it into the corresponding location to test that site 

## How to run the code

1. Open up a new terminal on VS Code. You can do this by selecting the "Terminal" at the top of the screen or if you already have a terminal open you can hit the "+" button to open a new terminal

2. run the command 
**python3 "name of file you want to test"** 
into the terminal
ex. python3 test_api.py

## Which file to change if you have new functionality to test
If you have new functionality to test you can add the methods or tests to the **api.py** file.

If you are adding a new endpoint for your test or just in general you need to change the **test_api.py** file. 
