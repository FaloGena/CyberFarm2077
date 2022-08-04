Small project to practice. Using Laravel 8.8 + Vue3.

You can create an animal (up to 4 total) of ceratin kind and let them "grow" - pictures of them getting bigger.

</br>

API endpoints:

GET /animal_kinds - get available kinds of animals

POST /animals - create new animal (kind => id should be passed), no more than 4 created at the same time

GET /animals - get current (created) Animals

GET /animals/{id} - get info about certain Animal

POST /animals/age - age by 1 Animal with passed animal => id

DELETE /animals - delete all created animals

</br>

If you want to test it by yourself don't forget to 

```
npm install
npm run dev
php artisan migrate
```

</br>

Some decisions were made to show different ways of approach
