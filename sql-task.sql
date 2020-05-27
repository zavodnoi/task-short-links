-- set @N := 4;
-- select name,
--        category_id,
--        price
-- from (select items.price,
--              items.category_id,
--              items.name,
--              @position := IF(@category = items.category_id, @position + 1, 1) AS position,
--              @category := items.category_id
--       from items
--       order by items.category_id, items.price DESC
--      ) as checked_items
-- where position <= @N
-- order by checked_items.category_id, checked_items.price DESC

-- Товары с максимальной ценой
set @n = 5;
select
    i1.name, i1.category_id,  i1.price
from items i1
join items i2 on i2.category_id =  i1.category_id and i2.price >= i1.price
group by i1.id
having COUNT(i2.id) <= @n
order by i1.category_id, i1.price DESC;

-- Пользователи
select
       year(users.birthdate) as years,
       sum(if(users.gender = 'M', 1, 0)) male,
       sum(if(users.gender = 'F', 1, 0)) female
from users
left join users_banned ub on users.id = ub.user_id
where ub.user_id is null
group by years
order by years;