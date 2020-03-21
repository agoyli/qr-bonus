QR-Bonus - mini bonus manager
========================

Mini bonus manager for e-commerce with QR code cards for customers
Developed with Symfony standard edition (v3.4) + Sonata admin bundle

Installation
------------
Install vendor componenets and grant access to database
```bash
composer installl
```

Create database tables
```bash
php bin/console doctrine:schema:create
```

Create admin user
```bash
php bin/console fos:user:create admin admin@mail.host adminpassword
```

And grant to admin user role admin
```bash
php bin/console fos:user:promote admin ROLE_ADMIN
```

