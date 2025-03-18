CREATE OR REPLACE View itemsview AS
SELECT items.* , categories.* FROM items
INNER JOIN categories on items.items_cat = categories.categories_id
////////////////////////////////////////////////////////////////////////////////////////////////
SELECT items1view.* ,1 AS favorite FROM items1view
INNER JOIN favorite ON favorite.favorite_itemsid = items1view.items_id AND favorite.favorite_usersid = 29
UNION ALL
SELECT * , 0 as favorite FROM items1view
WHERE items_id NOT IN ( SELECT items1view.items_id FROM items1view
INNER JOIN favorite ON favorite.favorite_itemsid = items1view.items_id AND favorite.favorite_usersid = 29   )
////////////////////////////////////////////////////////////////////////////////////////////////
CREATE OR REPLACE VIEW myfavorite AS
SELECT favorite.* , items.* , users.users_id FROM favorite
INNER JOIN users ON users.users_id = favorite.favorite_usersid  
INNER JOIN items ON items.items_id = favorite.favorite_itemsid
////////////////////////////////////////////////////////////////////////////////////////////////
CREATE OR REPLACE VIEW cartview AS
SELECT SUM(items.items_price - items.items_price *items_discount / 100) AS itemsprice,COUNT(cart_itemsid) AS countitems ,  cart.* , items.* FROM cart
INNER JOIN items ON cart.cart_itemsid = items.items_id
WHERE cart_orders = 0
GROUP BY cart.cart_itemsid , cart.cart_usersid , cart.cart_orders
////////////////////////////////////////////////////////////////////////////////////////////////
SELECT SUM(itemsprice) AS totalprice , SUM(countitems) AS totalitem  FROM cartview
GROUP BY cart_usersid



CREATE OR REPLACE VIEW oredersview AS
SELECT orders.* , address.* FROM orders 
LEFT JOIN address ON address.address_id = orders.orders_address



CREATE OR REPLACE VIEW ordersdetailsview AS
SELECT SUM(items.items_price - items.items_price *items_discount / 100) AS itemsprice,COUNT(cart_itemsid) AS countitems ,  cart.* , items.* , oredersview.* FROM cart
INNER JOIN items ON cart.cart_itemsid = items.items_id
INNER JOIN oredersview ON  oredersview.orders_id = cart.cart_orders
WHERE cart_orders != 0
GROUP BY cart.cart_itemsid , cart.cart_usersid , cart.cart_orders



CREATE OR REPLACE VIEW topsellingitems AS
SELECT COUNT(cart.cart_itemsid)  AS topitems , cart.* , items.*  ,  (items_price - (items_price * items_discount / 100)) AS itemspricediscount FROM cart
INNER JOIN items ON cart.cart_itemsid = items.items_id
WHERE cart.cart_orders != 0 
GROUP by cart.cart_itemsid