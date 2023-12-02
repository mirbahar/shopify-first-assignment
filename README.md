# Basic Shopify App

## Overview

Welcome to the Shopify App Repository! This Laravel project is specifically crafted for seamless integration with Shopify e-commerce sites and is tailored for submission to the Shopify App Store.

## Table of Contents

1. [Shopify Basic App Project Initial Setup](#1-shopify-basic-app-initial-setup)
2. [Database Setup (.env File)](#2-database-setup-env-file)
3. [Shopify Integration](#3-shopify-integration)
4. [Product Feature](#4-product-feature)

## 1. shopify Basic App initial setup

To set up the Laravel project, follow these steps:

1. Clone the repository to your local machine.
   ```bash
   git clone https://github.com/mirbahar/shopify-first-assignment
   cd shopify-first-assignment
   composer install

## 2. database setup env file
2.1 setup .env file
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3309
    DB_DATABASE=shopifyBasicDB
    DB_USERNAME=root
    DB_PASSWORD=Mysql@123
   ```
2.2 Run the migration command
```bash
php artisan migrate
   ```  
## 3. Shopify Integration with your own App.
3.1. Simply insert your Shopify API Key and Shopify Secret Key into the .env file.
   ```bash
    SHOPIFY_API_KEY=**********************************
    SHOPIFY_API_SECRET=*******************************
   ```
## 4. Project Feature List.
4.1 Shop Feature
```bash
Display Shop Name & id into shopifyfy App
   ```
4.2 Collection Feature
```bash
Colelction Creation
Collection Listing
   ```
4.3 Product Feature
```bash
Product Creation
Product Listing
Get All Product By Collection
   ```
