# The Gilded Rose API

#### Hi! I hope you'll enjoy working with this simple API to manage your Categories and Items.
#### May You find all the Sulfuras in the Kingdom!

## How to use this API


### Get all categories:
`GET api/categories`

### Get all items:
`GET api/items`

### Create a category:
`POST api/categories`
#### Keys:
* #### name - integer;

### Create Item:
`POST api/items`
#### Keys:
* #### *name* - string. Must end with _item
* #### *value* - float. Between [10;100].
* #### *quality* - integer. [-10;50].
* #### *category_id* - integer. Must match an existing category.

### Update Item:
`PUT api/items`
#### Keys:
* #### *name* - string. Must end with _item
* #### *value* - float. Between [10;100].
* #### *quality* - integer. [-10;50].
* #### *category_id* - integer. Must match an existing category.

### Get all Items of Category:
`GET api/categories/{id}/items`

### Delete all Items of Category:
`DELETE api/categories/{id}/items`
