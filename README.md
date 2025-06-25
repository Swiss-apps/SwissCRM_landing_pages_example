# Example Landing Pages project integrated with SwissCRM API
This project is only and example of a Landing page integration with the SwissCRM API. 

## How to run 
This is a simple project that only depends on you having [PHP](https://www.php.net/manual/en/install.php) installed. Make sure PHP is installed and configured properly.  

Open console in the root of the project and run this command: 

```bash
 php -S localhost:8080
```

## Application Flow
After the development server is up and running you can access the project here: [localhost:8080](localhost:8080). This will redirect you to the Contact Us page. 

To go through the flow of the application you need to: 
1. Start by accessing `localhost:8080/Index` with an `affId` provided as a URL parameter.
	- The `affId` is REQUIRED to start the flow.
	- Link with `affId`for testing: [localhost:8080/Index?affId=00112121](localhost:8080/Index?affId=00112121)
	- Accessing the Index page with an affId will call the `/clicks` endpoint.
	- `/clicks` will return a `session_token` to be saved.
2. Index page
	- Fill out the form with customer information.
	- All fields are required.
	- Submitting the form will call the `/leads` endpoint with the data from the form and the saved `session_token`.
3. Payment page
	- Fill the form wih card details.
	- All fields are required.
	- Submiting the form will call the `/checkout` endpoint with the card details from the form and the saved `session_token`.
	- Card details for testing purpose:
	``` 
	Card number: 4111 1111 1111 1111
	Card expiry date: 12/27
	Card CVV: 100
	```
4. Confirm order page. 
	- The `/confirm` endpoint is optional in case of 3DS payment to show the transaction is complete.
	- Clicking "Confirm order" will call the `/confirm` endpoint to check if the transaction is completed and we are able to proceed.
5. Upsell page
	- This page is optional if your campaign has upsell available.
	- Accepting the upsell will call the `/upsell` endpoint with the upsell productId and the saved `session_token`
	- Declining the upsell will direct to the Thank You page.
6. Thank You page
	- Landing on this page will call the `/success` endpoint with the saved `session_token
	- This is the end of the user journey.`

## Shutdown development server
In the opened condole just press `Ctrl + C`.

## SwissCRM API Documentaion
This is just an example of one integrations with our system. You can more about the API here: [SwissCRM Documentaion](https://support.swisscrm.com/how-tos/quick-startup-guide)