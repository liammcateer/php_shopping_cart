# Php shopping cart example

Main page is __index.php__  
  
  
__Reason for using Cookie instead of session:__  
I chose to use a cookie that will last 7 days so that the shopping cart is persisted over multiple sessions. I could have stored the cart in a session, but this would mean that the cart would be destroyed when closing the browser.
