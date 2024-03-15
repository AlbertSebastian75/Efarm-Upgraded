# Efarm-Upgraded
The upgraded version of E-farm Shopping, which is a website developed for farmers to automate the purchasing of agricultural equipment. In this system, the existing online store (Efarm) is advanced by automating all features in the store online.

# Technology Used:
Front End: HTML, CSS<br>
Back End: PHP, MYSQL 

# Requirements
Download Visual Studio Code, XAMPP for Windows, and a browser.<br>
Start: `Apache` and `mysql` in XAMPP Control Panel.<br>
In http://localhost/phpmyadmin/, create a database called `alb` and import the file `alb.sql`.<br>
Run locally in browser: `http://localhost/foldername`<br>
Login credentials for Admin: `Admin123`

# Existing Modules(E-farm)
1. Items module - Item ID, Name, Brand, Type, Description, Stock, prize and Image, It also have the Category Selection<br>
2. Search Items<br>
3. Login and Sign Up - Name, Email, Mobile, password and the Forgot password facility<br>
4. Users Module - User ID, Name, Email, Mobile, Address.<br>
5. Wish List Items<br>
6. Payment Module<br>
7. Sales Module - Order ID, date,  price, quantity, total price, date of purchase and review.<br>

# Modules
##### Purchase Module
:-) Admin adds the details of the items that are to be purchased for the store.<br>
:-) The list is accessible to all the vendors.<br>
##### Vendor Login & Register
:-) Vendors can see the purchase list made by the admin.<br>
:-) They  request for the conformation of the ordered item by the admin.<br>
##### Supplier Login & Register 
:-) View assigned items and deliver the items to the customer.<br>
##### Re-Order level
:-) The admin will get notified when the item goes down from its particular re-order level, which helps the admin to re-order the product for the store.<br>
##### Track Order
:-) After the purchase, the stakeholders will be able to track the order details<br>

# Upgraded Features
The supplier is used to deliver orders to the customer who places the orders. The suppliers and vendors need to first register to login into the system. The registration request will be sent to the admin panel and they need to wait for approval. After the approval, they can log in to the system and be able to perform their operations. <br><br>
The supplier can view the details of orders made by the customer at his location. Either he might be able to request for that order and can be assigned by admin to process it or admin can directly assign orders to the supplier to process it. The supplier can update the assigned order to the processing state after reaching the goods. After delivery, the supplier can request the delivery confirmation from the customer and the customer can change the order state as delivered. When the order status is being delivered the customer can download or print the sales billing details whenever required. The details will be permanently stored in the web application <br><br>
Admin used to purchase the products to the store through vendors. The products are added with a re-order level which is the minimum inventory or stock level for a specific product that triggers the reordering of more inventories when reached. Such products are directly notified to all the vendors. Also, the admin can directly request the products to the vendor for its purchasing. Vendors can apply their offer requests to the products that are below the re-order level and admin-requested products. After approving the vendor request by the admin, a vendor would be allowed to bring goods to the admin. The invoice is generated after the payment is done by the admin to the vendor for future references.

# Hosting
Create an AWS EC2 Instance and Connect to the Remote Desktop Protocol. Then Set Up the Project and Configure Security for necessary incoming and outgoing traffic.

# About Me
<img src="./css/image/347393526_250171240894141_1652025665265698400_n.jpg" alt="drawing" width="200"/>

Albert Sebastian<br>
albertsebastian75@gmail.com<br>
8590956627<br>
Kerala, India

# Screenshots
<table align="center">
    <tr>
      <td align="center"><img src="./css/screenshots/Screenshot (50).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (51).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (53).png" width="200"></td>
    </tr>
    <tr>
      <td align="center"><img src="./css/screenshots/Screenshot (54).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (55).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (56).png" width="200"></td>
    </tr>
    <tr>
      <td align="center"><img src="./css/screenshots/Screenshot (57).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (58).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (60).png" width="200"></td>
    </tr>
    <tr>
      <td align="center"><img src="./css/screenshots/Screenshot (62).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (65).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (66).png" width="200"></td>
    </tr>
    <tr>
      <td align="center"><img src="./css/screenshots/Screenshot (67).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (68).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (69).png" width="200"></td>
    </tr>
    <tr>
      <td align="center"><img src="./css/screenshots/Screenshot (70).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (71).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (72).png" width="200"></td>
    </tr>
    <tr>
      <td align="center"><img src="./css/screenshots/Screenshot (73).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (74).png" width="200"></td>
      <td align="center"><img src="./css/screenshots/Screenshot (76).png" width="200"></td>
    </tr>
  </table>