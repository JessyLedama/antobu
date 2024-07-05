## About Laravel Ecommerce

This project aims at creating a starter pack for building ecommerce applications 
with Laravel. This comes from a personal need, first and foremost. I have had to build ecommerce platforms severally, and the process of redoing the same thing with just minimal tweaks triggered me to build this as a scaffold that I can use to quickly build ecommerce apps.

After Ecommerce is fully implemented, I will begin adding ERP features to it. Essentially, the goal with this system is to build something similar to OdooERP. 
(I know it will take time)

## The following features have been implemented:
- *Product Management* - Manage products, including digital assets that are delivered on email. With this, you can manage an ecommerce platform for selling digital assets (such as music, arts etc) and also physical goods (stock management coming soon).

- *Authentication* - using Laravel Breeze.

- *Cart Management* - manage products in your cart.

- *Checkout Management* - checkout your cart to place order.

- *Product Categories* - manage different categories of products.

- *Orders* - manage and track orders made by customers.

- *Company Management* - Manage your companies. The company details will appear in invoices when invoicing is done. Meanwhile, company name when set appears in the navigation.

- *Theme Management* - Manage your website colors using theme. In the theme you can set a *favicon*, *primary color*, *secondary color*, *title font*, *content font*, *theme status*, *theme name*, *header color (navigation)*, *footer color*. More coming soon. The favicon when set appears in the webpage favicon and in the footer.

- *Newsletters* - You can keep your audience coming back using Newsletters. Write a cachy article and send it to your newsletter subscibers. Coming Soon: Grouping newsletter subscibers as contacts.

- *Settings* - You can manage the following from the settings: *Companies*, *Users*, *Theme*, *Slideshows*, *Statuses*. 

## The following features are coming soon:

- *Stock Management* - This will allow for effective management of physical goods. 

- *Purchase Management* - This will allow for purchasing and replenishing products when they run out of stock.

- *Roles* - Manage user roles and permissions.

- *Stores and Locations* - Locations will be inside stores. A store may have mutiple locations in it. These locations may contain physical goods.

- *Pages* - Managing pages through the UI. Create, edit, delete pages etc.

## Getting Started

To get started with this, you can run ```composer create project jessyledama/laravel-ecommerce```

Once the whole project has been downloaded, you may navigate into the project and run ``` php artisan migrate ``` to create the database tables, then run ``` php artisan db:seed ``` to initialise some test data. 

Then you may run ``` php artisan serve ``` to access the system on your browser.

## Contributing

Thank you for considering contributing to this project! We follow a similar contribution guide as the Laravel framework. The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
