### Welcome to Customer Laravel API

This is an API created for learning purposes running in Laravel 10 and Postgres 11. You can check it's source here [https://github.com/mhcgolds/customer-api](https://github.com/mhcgolds/customer-api).

---

#### List of public urls\*:

1. **Auth**
    - **sanctum/token** [*POST*] - Requests a new auth token to be used in front-end's requests
        - **email** (*string* - required) - User's e-mail
        - **password** (*string* - required) - User's password
        - **token_name** (*string* - required) - A name for token

2. **Customers**\*\*:
    - **customer/list** [*GET*] - Gets a list of Customers
    - **customer/show/(id)** [*GET*] - Get a specific Customer by Id
    - **customer/store** [*POST*] - Creates a new Customer
        - **name** (*string* - required) - Customer's name
        - **country** (*string* - required) - Customer's country
    - **customer/update/(id)** [*PUT*] - Updates a  Customer
        - **name** (*string* - required) - Customer's name
        - **country** (*string* - required) - Customer's country
    - **customer/destroy/(id)** [*DELETE*] - Delete a specific Customer by Id

---

Made by [Marcio Goldschmidt](https://github.com/mhcgolds/).

--- 

\* All urls should be prefixed with segment **/api/**.

\*\* Url requires auth and must have token in header.