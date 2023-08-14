<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Customer Laravel API</title>
    </head>
    <body>
        <h3>Welcome to Customer Laravel API</h3>

        <p>This is an API created for learning purposes running in Laravel 10 and Postgres 11.</p>

        <p>You can check it's source here <a href="https://github.com/mhcgolds/customer-api">https://github.com/mhcgolds/customer-api</a>.</p>

        <h4>List of public urls: </h4>

        <ul>
            <li>Auth: 
                <ul>
                    <li>
                        <strong>auth/login</strong> (<em>POST</em>)
                        <ul>
                            <li>
                                <strong>email</strong> (<em>string</em> - required)
                            </li>
                            <li>
                                <strong>password</strong> (<em>string</em> - required)
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </body>
</html>
