## Boa webshop test

This is a small test to show my coding skill

### assignment:
Develop a mini shop for beers. 
the assignment exist of multiple parts described below.
either laravel or symfony

- [X] Import Data to local db
    - [X] Create local db (ideally using migrations)
    - [X] write import for reading json file and store in db
- [X] Render Products / categories
    - [X] List categories in navbar
    - [X] on click of categorie render category page (url using category name as slug) 
    - [X] on the above page render products related to the category
    - [X] per product render name, description, alcoholpercentage and price
- [X] Adding to cart
    - [X] create cart stored in session
    * Had to use vuex state management     
    - [X] on click of add to cart add product through http request
    - [X] if product already inserted raise quantity by 1
- [ ] Render Cart (70%)
    - [X] add link in navbar to go to cart
    - [X] on this page list products inside cart
    - [ ] make sure we are able to adjust quantity and update cart with correct data
    * increasing works remove/decrease not yet
    - [X] render vat included prices on page
  
  **both adjusting quantity as removing product will go through js so page doesn't refresh.
    When these are adjusted render alert to customer

## Not completed
Apologies in advance but removing a product and decrease quantity in cart is not yet finished.
The problem is I didn't find the correct way to use symfony session.
I had to use Vuex state but this was also my first time integrating this.
The code where I tried implementing session is documented in the code with a todo above.

sincere apologies but this is a perfect example of something where junior/medior developers can use a senior
or someone with experience in what you are trying to achieve 
## installation:

> #### clone repo local:
>
> git clone https://github.com/waelkensjens/BoaWebShop.git

> #### copy .env:
> 
> cp .env.example .env

>#### adjust .env and setup db settings:
>
>DATABASE_URL="mysql://root:@127.0.0.1:3306/webshop?serverVersion=mariadb-10.4.22"

> #### install vendors:
> composer install

> #### install modules:
>
> ##### npm:
> npm install && npm run dev 
>
>> then use npx mix
>
>#### yarn:
> yarn install
>
>> then use yarn build

> #### Create database:
> 
> symfony console doctrine:database:create

> #### Run migrations:
> 
> symfony console doctrine:migrations:migrate

> #### Seed database:
>
> symfony console doctrine:fixtures:load

> #### Start server:
> symfony serve
> 
> or
> 
>symfony server:start 
> 
> or
> 
>php bin/console server:start


## Pages
/ => Homepage

/categories{name}/ => Category page with related products

/cart => checkout page with details of products in cart


## Insights

- after doing this assignment in symfony I realised how easy laravel is :eyes:
- but never the less I enjoyed it very much even tho I had some problems which I'll describe below



## Hick ups

#### What was harder than expected

- I had to start over 4 times
  - I tried starting while learning but realized I didn't have enough symfony knowledge 1
  - Started using Twig ( I know nothing about it ) 2
  - trying to add vue messed up modules and webpack completely 3
  - finally, started fresh implementing vue3 with inertia

- symfony session
  - as you'll notice I used vuex with creating cookies to create a persistent state.
  (I can't find a proper way to use symfony session) apologies in advance

- annotations
  - Really enjoyed this but coming from a web.php file it was difficult

- Timing
  - I thought this was going to be done right away. But all in all I find that without knowledge of symfony i didn't do so bad.
    I could have gone the easy way using laravel but always enjoy using new technologies
  
I probably had way more hick ups along the way but those are the ones I really struggled with

I thank u in advance for giving me the opportunity of doing this assignment,
and I hope you enjoy the result 

Kind regards Waelkens Jens
